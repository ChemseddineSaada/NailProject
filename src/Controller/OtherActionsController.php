<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OtherActionsController extends AbstractController
{
    /**
     * @Route("/newsletter", name="newsletter.subscribe")
     * 
     * La fonction newsletterSubscription crée une instance de newsletter,
     * récupère les données saisies, vérifie leurs validités
     * procède au stockage des données.
     * 
     * @param request $request
     * @param ObjectManager $manager
     * 
     * @return void
     */

    public function newsletterSubscription(Request $request, ObjectManager $manager)
    {
        $newsletter = new Newsletter();
        $email = null;

        if($request->isMethod('post')){
            $email = $request->request->get("email");
            $path = $request->request->get('last-route');
        }
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $subscriber = null;
        $subscriber = $this->getDoctrine()->getRepository(Newsletter::Class)->findByEmail($email);

        if(!is_null($email)){
            if(empty($subscriber)){

                $newsletter->setEmail($email);

                $manager->persist($newsletter);
                $manager->flush();

                $this->addFlash(
                    'notice_success',
                    'Félicitation ! vous êtes désormais abonné à notre Newsletter'
                    );
            }
        else{
            $this->addFlash(
                'notice_fail',
                'Un problème est survenu lors de votre inscription à notre Newsletter'
                );
            }
        }     

        return $this->redirectToRoute($path);
    }


    /**
     * @Route("/newsletter/unsubscribe/{id}", name="newsletter.unsubscribe")
     * 
     * La fonction newsletterUnsubscribe prend instance existante de la classe Newsletter
     * et la supprime
     * 
     * @param Newsletter $newsletter
     * 
     * @return void
     */

    public function newsletterUnsubscribe(Newsletter $newsletter){

        $manager = $this->getDoctrine()->getManager();

        //Suppression de la catégorie ciblé     
        $manager->remove($newsletter);
        $manager->flush();

        $this->addFlash(
            'notice_bad',
            'Vous venez de vous désabonner de notre Newsletter'
            );

        return $this->redirectToRoute('shop.home.index');

    }
}
