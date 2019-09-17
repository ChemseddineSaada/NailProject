<?php

namespace App\Controller;

use App\Entity\EventSubs;
use App\Form\EventSubsType;
use App\Form\MessageMeType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\{Product,PackOffer,Subscription,Event,MessageMe,EventPassed};

class ShopController extends AbstractController
{
    /**
     * @Route("/", name="shop.home.index")
     */
    public function index()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findTopProduct();
        $offers = $this->getDoctrine()->getRepository(PackOffer::class)->findAllHomeView();
        $events = $this->getDoctrine()->getRepository(Event::class)->findPublished();

        
        $subscriber = new EventSubs();
        
        $form = $this->createForm(EventSubsType::class,$subscriber);

        //Pour afficher un seul événement à la fois sur la page d'accueil
        isset($events[0]) ? $event = $events[0] : $event = null;
        isset($products[0]) ? $product = $products[0] : $product = null;

        $i = 0;

        //Pour limiter à 2 le nombre d'offres sur la page d'accueil
        foreach($offers as $offer){
            if($i < 2){
                $published_offers[] = $offer;
            }
            $i++;          
        }
        
        return $this->render('shop/index.html.twig', [
            'product' => $product,
            'offers' => $offers,
            'event' => $event,
            'form'=> $form->createView()
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
     * @Route("/events", name="shop.list.events")
     */
    public function listEvents(Request $request, ObjectManager $manager){
        
        //Récupération des informations depuis la base de donnée
        $posts = $this->getDoctrine()->getRepository(EventPassed::class)->findAll();
        $events = $this->getDoctrine()->getRepository(Event::class)->findPublished();
        
        //Création et traitement du formulaire d'inscription aux événements

        $subscriber = new EventSubs();
        $data = $request->get('event_subs');
        
        $form = $this->createForm(EventSubsType::class,$subscriber);

        //récupération de l'url précédent
        $referer = $request->headers->get('referer');
     
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){

            //Vérifier que l'utilisateur a bien choisi au moins un événement
            
            if(count($subscriber->getEvent()) !== 0)
            {
                $manager->persist($subscriber);
                $manager->flush();

                //redirection vers l'url précédent
                return $this->redirect($referer);
            }
            else{          
                $this->addFlash(
                    'notice_bad',
                    'Vous devez choisir au moins un événement.'
                );
            }

        }

        else if(isset($data)){

            $subscriber->setName($data['name']);
            $subscriber->setFirstName($data['first_name']);
            $subscriber->setEmail($data['email']['first']);

            if(isset($data['event'])){
                $i =0;
                foreach($data['event'] as $eventId){
                    $event = $this->getDoctrine()->getRepository(Event::Class)->findById($data['event'][$i]);
                    $subscriber->addEvent($event);
                    $i++;
                } 
            }

            try{
                
                $manager->persist($subscriber);
                $manager->flush();
            }
            catch(\Exception $e){
                $this->addFlash(
                    'notice_bad',
                    'Vous êtes déjà inscris à un événement.'
                );
            }

            //redirection vers l'url précédent
            return $this->redirect($referer);
        }


        return $this->render('shop/events.html.twig', [
            'events_passed' => $posts,
            'events' => $events,
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/articles", name="shop.list.articles")
     */
    public function listArticles(){

        return $this->render('shop/articles.html.twig', [
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
