<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\DeliveryAddress;
use App\Form\ChangePasswordType;
use App\Form\DeliveryAddressType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AddressController extends AbstractController
{
    /**
     * @Route("/addAddress", name="user.address.add")
     * La fonction addAddress récupère les saisies du formulaire 
     * par requête sous forme de tableau et les assigne à une nouvelle
     * entité DeliveryAddress
     * 
     * @param request $request
     * 
     * @return void
     */

    public function addAddress(Request $request, ObjectManager $manager, Security $security){

        $deliveryAddress = new DeliveryAddress();

        $user = $security->getUser();

        $data = $request->get('delivery_address');

        if(isset($data)){
                
            $deliveryAddress->setUser($user);

            if(isset($data['surname'])) $deliveryAddress->setSurname($data['surname']);
            if(isset($data['address'])) $deliveryAddress->setAddress($data['address']);
            if(isset($data['additional_address'])) $deliveryAddress->setAdditionalAddress($data['additional_address']);
            if(isset($data['zipcode'])) $deliveryAddress->setZipcode($data['zipcode']);
            if(isset($data['country'])) $deliveryAddress->setCountry($data['country']);
            if(isset($data['forname'])) $deliveryAddress->setForname($data['forname']);
            if(isset($data['phone'])) $deliveryAddress->setPhone($data['phone']);
            if(isset($data['email'])) $deliveryAddress->setEmail($data['email']);

            $user->addDeliveryAddress($deliveryAddress);

            $manager->persist($user);
            $manager->persist($deliveryAddress);
            $manager->flush();    

            $this->addFlash(
                'notice_success',
                'L\'adresse a été ajoutée avec succès !'
                );
        }

        else
        {
            $this->addFlash(
                'notice_bad',
                'L\'adresse n\'a pas été ajoutée !'
                );
        }


        return $this->redirectToRoute('user_panel');

    }


    /**
     * @Route("/deleteAddress/{id}", name="user.address.delete")
     * La fonction addAddress récupère les saisies du formulaire 
     * par requête sous forme de tableau et les assigne à une nouvelle
     * entité DeliveryAddress
     * 
     * @param DeliveryAddress $address
     * 
     * @return void
     */

    public function deleteAddress(DeliveryAddress $address, Security $security){

        $user = $security->getUser();

        $user->removeDeliveryAddress($address);

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($address);
        $manager->flush();

        $this->addFlash(
            'notice_success',
            'L\'adresse a été supprimée avec succès !'
            );

        return $this->redirectToRoute('user_panel');
    }

    


}
