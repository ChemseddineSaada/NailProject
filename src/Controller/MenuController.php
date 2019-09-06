<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/mainMenu", name="partial.menu.main")
     */
    public function mainMenu()
    {
        $menu = [
            'home' => ['route'=>'shop.home.index','label'=>'Accueil'],
            'products' => ['route'=>'shop.list.products','label'=>'Nos produits'],
            'offers' => ['route'=>'shop.list.offers','label'=>'Nos offres'],
            'articles' => ['route'=>'shop.list.articles','label'=>'Événements'],
            'whoweare' => ['route'=>'shop.show.whoweare','label'=>'Qui sommes-nous ?'],
            'contact' => ['route'=>'shop.show.messageme','label'=>'Contactez nous'],
        ];
        return $this->render('partials/menu-main.html.twig', [
            'menu' => $menu,
        ]);
    }
}
