<?php

namespace App\Form;

use App\Entity\Smgyd;
use App\Entity\Nomenclador;
use App\Form\SmgydFamiliarType;
use App\Form\SmgydOrganizacionType;
use App\Form\SmgydProcesoJudicialType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SmgydType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Campos relacionados con Nomenclador
            ->add('smgyd2', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('smgyd3', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('smgyd4', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('smgyd7', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('smgyd10', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('smgyd15', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('smgyd15a', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('smgyd15b', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('smgyd16', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('smgyd17', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('smgyd19', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])

            // Campos booleanos y textos
            ->add('smgyd8', CheckboxType::class, ['required' => false])
            ->add('smgyd8a', TextType::class, ['required' => false])
            ->add('smgyd9', CheckboxType::class, ['required' => false])
            ->add('smgyd9a', CheckboxType::class, ['required' => false])
            ->add('smgyd11', CheckboxType::class, ['required' => false])
            ->add('smgyd12', CheckboxType::class, ['required' => false])
            ->add('smgyd13', CheckboxType::class, ['required' => false])
            ->add('smgyd14', CheckboxType::class, ['required' => false])
            ->add('smgyd15c', TextType::class, ['required' => false])
            ->add('smgyd16b', TextType::class, ['required' => false])
            ->add('smgyd16c', TextType::class, ['required' => false])
            ->add('smgyd18', CheckboxType::class, ['required' => false])
            ->add('smgyd20', TextareaType::class, ['required' => false])
            ->add('smgyd21', TextareaType::class, ['required' => false])
            ->add('usuariocarga', TextType::class, ['required' => false])
            ->add('fechacarga', DateTimeType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])

            // Relaciones OneToMany
            ->add('familiares', CollectionType::class, [
                'entry_type' => SmgydFamiliarType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => false,
            ])
            ->add('organizaciones', CollectionType::class, [
                'entry_type' => SmgydOrganizacionType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => false,
            ])
            ->add('procesosJudiciales', CollectionType::class, [
                'entry_type' => SmgydProcesoJudicialType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Smgyd::class,
        ]);
    }
}
