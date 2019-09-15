<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\SignUpType;
use App\Form\ChangePasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

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

        $form = $this->createForm(SignUpType::class,$user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            //Supprimer toutes les erreurs après validation
            $form->clearErrors(true);

            $password = $encoder->encodePassword($user,$user->getPassword());

            $user->setPassword($password);

            $manager->persist($user);
            $manager->flush();

/*             $token = new UsernamePasswordToken(
                $user,
                $password,
                'main',
                $user->getRoles()
            );

            $this->get('security.token_storage')->setToken($token);
            $this->get('session')->set('_security_main', serialize($token)); */

            return $this->redirectToRoute('shop.home.index');
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
     * Cette fonction passe en vue le formulaire de modification de mot de passe
     * 
     * @param Security $security
     * @param Request $request
     * 
     * @return User  $user
     */

     public function userPanel(Security $security, Request $request, ObjectManager $manager){

        $user = $security->getUser();

        $form = $this->createForm(UserType::class,$user);
        $passwordForm = $this->createForm(ChangePasswordType::Class,$user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($user);
            $manager->flush();

            
            $this->addFlash(
                'notice_success',
                'Vos modifications ont bien été enregistrées.'
                );

            return $this->redirectToRoute('login_panel');
        }

        return $this->render('Authentification/user-panel.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'password_form' => $passwordForm->createView(),
        ]);
    }


     /**
     * @Route("/passwordChange", name="password_change")
     * 
     * La fonction passwordChange récupère les données saisies dans 
     * le champ de modification du mot de passe, vérifie leur validité
     * et enregistre le mot de passe dans la base de donnée
     * 
     * @param Security $security
     * @param Request $request
     * 
     * @return void
     */

    public function passwordChange(Security $security, Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder){

        $user = $security->getUser();

        $passwordForm = $this->createForm(ChangePasswordType::Class,$user);

        $passwordForm->handleRequest($request);

        
        if($passwordForm->isSubmitted() && $passwordForm->isValid()){

            $password = $encoder->encodePassword($user,$user->getPassword());

            $user->setPassword($password);

            $manager->persist($user);
            $manager->flush();

            
            $this->addFlash(
                'notice_success',
                'Votre mot de passe a bien été modifié.'
                );

            return $this->redirectToRoute('login_panel');
        }

        else{
            $this->addFlash(
                'notice_bad',
                'Votre mot de passe n\' pas été modifié.'
                );

            return $this->redirectToRoute('user_panel');
        }
    }
}
