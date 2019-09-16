<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Security\Core\Security;
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

    public function mainMenu(Security $security)
    {

        $user = $security->getUser();

        if($user !== null)
        {
            $userId = $user->getId();
            $user = $this->getDoctrine()->getRepository(User::Class)->findById($userId);
        } 

        $menu = [
            'home' => ['route'=>'shop.home.index','label'=>'Accueil'],
            'products' => ['route'=>'shop.list.products','label'=>'Nos produits'],
            'offers' => ['route'=>'shop.list.offers','label'=>'Nos offres'],
            'events' => ['route'=>'shop.list.events','label'=>'Événements'],
            'blog' => ['route'=>'shop.list.articles', 'label'=> "Notre jour'nail"],
            'whoweare' => ['route'=>'shop.show.whoweare','label'=>'Qui sommes-nous ?'],
        ];
        return $this->render('partials/menu-main.html.twig', [
            'menu' => $menu,
            'user'=>$user
        ]);
    }
}
