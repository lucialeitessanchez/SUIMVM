<?php

namespace App\Form;

use App\Entity\Caj;
use App\Entity\Nomenclador;
use App\Entity\EquipoReferencia;
use App\Entity\Caso;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CajType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('caj_1a', TextType::class)
            ->add('caj_1b', DateType::class, ['widget' => 'single_text'])
            ->add('caj_1c', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'nombre', // ajusta según tu entidad
            ])
            ->add('caj_1d', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'nombre',
            ])
            ->add('caj_2a', TextType::class)
            ->add('caj_2b', TextType::class)
            ->add('caj_2c', DateType::class, ['widget' => 'single_text'])
            ->add('caj_2d', TextType::class)
            ->add('caj_2e', TextareaType::class)
            ->add('caj_2f', TextType::class)
            ->add('caj_3a', TextType::class)
            ->add('caj_3b', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'nombre',
            ])
            ->add('caj_3c', TextType::class)
            ->add('caj_3d', TextType::class)
            ->add('caj_3e', DateType::class, ['widget' => 'single_text'])
            ->add('caj_3f', TextType::class)
            ->add('caj_3g', TextareaType::class)
            ->add('caj_3h', TextType::class)
            ->add('caj_3i', EntityType::class, [
                'class' => EquipoReferencia::class,
                'choice_label' => 'nombre', // ajusta según tu entidad
            ])
            ->add('caj_3j', TextType::class)
            ->add('caj_4a', TextType::class)
            ->add('caj_4b', TextType::class)
            ->add('caj_4c', TextareaType::class);
            /*->add('caso', EntityType::class, [
                'class' => Caso::class,
                'choice_label' => 'id_Caso', // ajusta según tu entidad
            ]);*/
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Caj::class,
        ]);
    }
}
