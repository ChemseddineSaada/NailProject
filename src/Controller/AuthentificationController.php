<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Security;

/**
 * La classe permettant de gérer les méthodes d'inscription et d'authentification
 * 
 * @author Chemseddine
 * @method signUp, loginPanel
 */

class AuthentificationController extends AbstractController
{
    /**
     * @Route("/signup", name="sign_up")
     * 
     * La fonction signUp crée un formulaire d'inscription,
     * récupère les données saisies, vérifie leurs validités
     * procède au hashage du mot de passe et au stockage des données
     * 
     * @param request $request
     * @param ObjectManager $manager
     * @param UserPasswordEncoderInterface $encoder
     * 
     * @return UserType $form to Authentification/signup.html.twig
     */

    public function signUp(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $form = $this->createForm(UserType::class,$user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $hash = $encoder->encodePassword($user,$user->getPassword());

            $profile = $encoder->encodePassword($user,$user->getUsername());

            $user->setProfile($profile);
            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('login_panel');
        }

        return $this->render('Authentification/signup.html.twig', [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/login", name="login_panel")
     * 
     * La fonction loginPanel récupère et traite les saisies d'authentification
     * 
     * @param AuthenticationUtils $authenticationUtils
     * 
     * @return string  $lastUsername
     * @return array  $error
     */

    public function loginPanel(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        
        //Récupère le dernier identifiant utilisé
        $lastEmail = $authenticationUtils->getLastUsername();

        //Retourne le dernier URL visité.
        $referer = $request->headers->get('referer');
        
        return $this->render('authentification/login.html.twig', [
            'last_email' => $lastEmail,
            'error' => $error,
            'referer' => $referer,
        ]);
    }

    /**
     * @Route("/userPanel", name="user_panel")
     * 
     * La fonction userPanel récupère les informations concernant l'utilisateur
     * et les renvoie en vue
     * 
     * @param void
     * 
     * @return string  $lastUsername
     * @return array  $error
     */

     public function userPanel(Security $security, Request $request){

        $user = $security->getUser();

        $form = $this->createForm(UserType::class,$user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($user);
            $manager->flush();

            
            $this->addFlash(
                'notice_success',
                'Vos modifications ont bien été enregistrées.'
                );

            return $this->redirectToRoute('user_panel');
        }

        return $this->render('Authentification/user-panel.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}
