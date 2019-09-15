<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\{TextType,EmailType,SubmitType,CheckboxType,PasswordType,RepeatedType};


class SignUpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,['label'=>'Prénom'])
            ->add('last_name',TextType::class,['label'=>'Nom'])
            ->add('email', RepeatedType::class, [
                'type' => EmailType::class,
                'invalid_message' => 'Les adresses email saisies sont différentes.',
                'required' => true,
                'first_options'  => ['label' => 'Email', 'attr'=>['placeholder'=>'Email']],
                'second_options' => ['label' => 'Confirmation email','attr'=>['placeholder'=>'Confirmation email']],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passes saisis sont différents.',
                'first_options'  => ['label' => 'Mot de passe', 'attr'=>['placeholder'=>'Mot de passe']],
                'second_options' => ['label' => 'Confirmation mot de passe','attr'=>['placeholder'=>'Confirmation mot de passe']],
            ])
            ->add('termsAccepted', CheckboxType::class, array(
                'mapped' => false,
                'constraints' => new IsTrue()
            ))
            ->add('save',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
