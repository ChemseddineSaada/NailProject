<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends EasyAdminController
{

    /**
     * La fonction updateEntity prend l'entité en cours 
     * en argument pour lui assigner une nouvelle date de 
     * mis à jour si la méthode 'setUpdateAt' existe dans cet entité.
     * 
     * @param Entity $entity
     * 
     * @return void
     */
    public function updateEntity($entity)
    {
        if (method_exists($entity, 'setUpdatedAt')) {
            $entity->setUpdatedAt(new \DateTime());
        }

        parent::updateEntity($entity);
    }
    
}
