<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\EventSubs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class EventSubsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,['label' => false,'attr'=>['placeholder'=>'Nom']])
            ->add('first_name',TextType::class,['label' => false,'attr'=>['placeholder'=>'Prénom']])           
            ->add('email', RepeatedType::class, [
                'type' => EmailType::class,
                'invalid_message' => "L'email de confirmation ne correspond pas.",
                'required' => true,
                'first_options'  => ['label' => false, 'attr'=>['placeholder'=>'Email']],
                'second_options' => ['label' => false,'attr'=>['placeholder'=>'Confirmation email']],
            ])
            ->add('event',EntityType::Class,['help'=>'Maintenez CTRL appuyé pour séléctionner plusieurs événements.','class'=> Event::Class,'label' => false, 'multiple'=>true,'expanded'=>false])
            ->add('save',SubmitType::Class,['label'=>"valider"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EventSubs::class,
        ]);
    }
}
