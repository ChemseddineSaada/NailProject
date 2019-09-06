<?php

namespace App\Controller;

use App\Entity\MessageMe;
use App\Form\MessageMeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\{Product,PackOffer,Subscription,Article};
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShopController extends AbstractController
{
    /**
     * @Route("/index", name="shop.home.index")
     */
    public function index()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAllHomeView();
        $offers = $this->getDoctrine()->getRepository(PackOffer::class)->findAllHomeView();
        $subscriptions = $this->getDoctrine()->getRepository(Subscription::class)->findAllHomeView();

        return $this->render('shop/index.html.twig', [
            'products' => $products,
            'offers' => $offers,
            'subscriptions' => $subscriptions
        ]);
    }

    /**
     * @Route("/products", name="shop.list.products")
     */
    public function listProducts(){
        $products = $this->getDoctrine()->getRepository(Product::class)->findPublished();

        return $this->render('shop/products.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/offers", name="shop.list.offers")
     */
    public function listOffers(){
        $pack_offers = $this->getDoctrine()->getRepository(PackOffer::class)->findPublished();
        $subscriptions = $this->getDoctrine()->getRepository(Subscription::class)->findPublished();

        return $this->render('shop/offers.html.twig', [
            'pack_offers' => $pack_offers,
            'subscriptions'=> $subscriptions
        ]);
    }

    /**
     * @Route("/articles", name="shop.list.articles")
     */
    public function listArticles(){
        $posts = $this->getDoctrine()->getRepository(Article::class)->findPosts();
        $events = $this->getDoctrine()->getRepository(Article::class)->findEvents();

        return $this->render('shop/articles.html.twig', [
            'posts' => $posts,
            'events' => $events
        ]);
    }

    /**
     * @Route("/whoweare", name="shop.show.whoweare")
     */
    public function whoWeAre(){

        return $this->render('shop/whoweare.html.twig', [
            'title' => "Qui sommes-nous ?",
        ]);
    }

    /**
     * @Route("/messageMe", name="shop.show.messageme")
     */
    public function messageMe(Request $request,\Swift_Mailer $mailer){

        $message = new MessageMe();

        $form = $this->createForm(MessageMeType::class, $message);

        $form->handleRequest($request);

        if( $form->isSubmitted() && $form-> isValid()){

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($form->getData());
            $manager->flush();

            $mail = (new \Swift_Message('Contact Email'))
                        ->setFrom($message->getEmail())
                        ->setTo('chemseddine.saada2@gmail.com')
                        ->setBody(
                                $this->renderView(
                                'emails/messageme.html.twig',
                                ['message' => $message]
                            ),
                            'text/html'
                        );

            $mailer->send($mail);

            $this->addFlash(
                'success',
                'Votre message a bien été envoyé'
            );
            return $this->redirectToRoute('shop.show.messageme');
        }
        return $this->render('shop/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
