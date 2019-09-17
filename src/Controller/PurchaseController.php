<?php

namespace App\Controller;

use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PurchaseController extends AbstractController
{

    /**
     * @Route("/addToCart", name="purchase.cart.index")
     */
    public function index()
    {

        return $this->render('purchase/index.html.twig', [
            'controller_name' => 'PurchaseController',
        ]);
    }

    /**
     * @Route("/addToCart/{id}", name="purchase.cart.add")
     */
    public function addToCart(Security $security)
    {
        $user = $security->getUser();

        return $this->render('purchase/cart.html.twig', [
            'controller_name' => 'PurchaseController',
        ]);
    }

    /**
     * @Route("/payment", name="purchase.payment.index")
     */
    public function payment()
    {

        return $this->render('purchase/payment.html.twig', [
            'controller_name' => 'PurchaseController',
        ]);
     }
}
