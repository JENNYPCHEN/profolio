<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;



class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom',TextType::class,['required' => true],['attr' => ['class' => 'form-control my-2','placeholder'=>'Votre nom *']])
        ->add('email',EmailType::class,['required' => true],['attr' => ['class' => 'form-control my-2','placeholder'=>'Votre email *']])
        ->add('subjet',TextType::class,['required' => true],['attr' => ['class' => 'form-control my-2','placeholder'=>'Votre subjet *']])
        ->add('message',TextareaType::class,['required' => true],['attr' => ['class' => 'form-control  my-md-2','placeholder'=>'Votre message *']])
        ->add('agreeTerms', CheckboxType::class,['required' => true],['attr'=>['class'=>'form-check-input']])
        ->add('envoyer',SubmitType::class,['attr'=>['class'=>'button px-2']])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
