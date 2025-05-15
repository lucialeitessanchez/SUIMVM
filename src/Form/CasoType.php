<?php

namespace App\Form;

use App\Entity\Caso;
use App\Entity\Localidad;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CasoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          /*  ->add('nombre', TextType::class, [
                'label' => 'Nombre',
            ])*/
            ->add('fechaCarga', DateType::class, [
                'label' => 'Fecha de Ingreso',
                'widget' => 'single_text',
            ])
            ->add('fechaHecho', DateType::class, [
                'label' => 'Fecha del hecho',
                'widget' => 'single_text',
            ])
            ->add('fechaAnoticiamiento', DateType::class, [
                'label' => 'Fecha de anoticiamiento del hecho',
                'widget' => 'single_text',
            ])
            ->add('edad',IntegerType::class, [
                'label' => 'Edad',
                'required' => false,
            ])
            ->add('barrioHecho', TextType::class, [
                'label' => 'Barrio del hecho',
                'required' => false,
            ])
            
            ->add('localidadIdLocalidad', EntityType::class, array(
                'required' => true,
                'label' => 'Localidad',
                'multiple' => false,
                'choice_label' => 'localidad',
                'placeholder' => 'Todos',
                'class' => Localidad::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('l')->orderBy('l.localidad', 'ASC');
                }
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Caso::class,
        ]);
    }
}
