<?php

namespace App\Form;

use App\Entity\DeliveryAddress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class DeliveryAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surname',TextType::Class,['label'=>'Intitulé de l\'adresse'])
            ->add('address',TextType::Class,['label'=>'Adresse'])
            ->add('additional_address',TextType::Class,['label'=>'Complément d\'adresse'])
            ->add('zipcode',IntegerType::Class,['label'=>'Code postal'])
            ->add('country',CountryType::Class,['label'=>'Pays'])
            ->add('forname',TextType::Class,['label'=>'Nom et Prénom'])
            ->add('phone',TelType::Class,['label'=>'N° Téléphone'])
            ->add('email',EmailType::Class,['label'=>'Email'])
            ->add('save',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DeliveryAddress::class,
        ]);
    }
}
