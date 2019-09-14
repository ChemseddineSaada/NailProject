<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuController extends AbstractController
{
    /**
     * @Route("/mainMenu", name="partial.menu.main")
     *
     * 
     * La fonction mainMenu retourne les données relatives au menu principal.
     * 
     * @param void
     * 
     * @return array $menu
     */

    public function mainMenu()
    {

        $menu = [
            'home' => ['route'=>'shop.home.index','label'=>'Accueil'],
            'products' => ['route'=>'shop.list.products','label'=>'Nos produits'],
            'offers' => ['route'=>'shop.list.offers','label'=>'Nos offres'],
            'events' => ['route'=>'shop.list.events','label'=>'Événements'],
            'blog' => ['route'=>'shop.list.articles', 'label'=> "Notre jour'nail"],
            'whoweare' => ['route'=>'shop.show.whoweare','label'=>'Qui sommes-nous ?'],
            'contact' => ['route'=>'shop.show.messageme','label'=>'Contactez nous'],
        ];
        return $this->render('partials/menu-main.html.twig', [
            'menu' => $menu,
        ]);
    }
}
