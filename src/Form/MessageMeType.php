<?php

namespace App\Form;

use App\Entity\MessageMe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MessageMeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',EmailType::Class)
            ->add('name')
            ->add('last_name')
            ->add('phone',TelType::Class)            
            ->add('object',ChoiceType::Class,['choices'=>[
                'Problème produit' => 'product',
                'Problème technique' => 'technique',
                'Problème de paiement' => 'payment',
                'Problème de livraison' => 'delivery',
                'Autre' => 'other'
            ],])
            ->add('message')
            ->add('save',SubmitType::Class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MessageMe::class,
        ]);
    }
}
