<?php

namespace App\Form;

use App\Entity\Organismo;
use App\Entity\Localidad;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class OrganismoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
            ->add('nombreOrganismo', TextType::class, [
                'label' => 'Nombre del organismo'
            ])
            ->add('referente', TextType::class)
            ->add('domicilio', TextType::class)
            ->add('telefono', TextType::class)
            ->add('celular', TextType::class)
            ->add('email', TextType::class)
            ->add('localidad', EntityType::class, [
                'class' => Localidad::class,
                'choice_label' => 'localidad',
                'placeholder' => 'Seleccione una localidad',
                'attr' => [
                    'class' => 'select2-autocomplete',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Organismo::class,
        ]);
    }
}
