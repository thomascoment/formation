<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('services', ChoiceType::class, [
                'choices' => [
                    'Comptabilité' => 'compta@demo.fr',
                    'Support' => 'support@demo.fr',
                    'Commerciaux' => 'commerciaux@demo.fr'
                ]
            ])
            ->add('name', TextType::class, [
                'empty_data' => '',
                'label' => 'Nom, Prénom'
            ])
            ->add('email', EmailType::class, [
                'empty_data' => ''
            ])
            ->add('message', TextareaType::class, [
                'empty_data' => ''
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer'
            ])
            


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
