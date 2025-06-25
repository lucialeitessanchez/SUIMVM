<?php

namespace App\Form;

use App\Entity\GobLocales;
use App\Entity\Caso;
use App\Entity\Nomenclador;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GobLocalesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gobloc11', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('gobloc12', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador', // o el campo que muestre el texto visible
                'multiple' => true,
                //'expanded' => true, // ✅ true = checkboxes | false = <select multiple>
                'required' => false,
                'by_reference' => false,
                'label' => 'Motivo del primer contacto del equipo local respecto a la victima en el contexto femicida ',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'GOBLOC_1_2')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
            
            ->add('gobloc13', ChoiceType::class, [
                'label' => 'Nivel de riesgo determinado por el equipo',
                'choices' => [
                    'Bajo' => 'Bajo',
                    'Medio' => 'Medio',
                    'Alto' => 'Alto',
                    'Crítico' => 'Crítico',
                ],
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('gobloc14', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador', // o el campo que muestre el texto visible
                'multiple' => true,
                //'expanded' => true, // ✅ true = checkboxes | false = <select multiple>
                'required' => false,
                'by_reference' => false,
                'label' => 'TIPO APOYO',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'TIPO_APOYO')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
             ->add('gobloc15', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador', // o el campo que muestre el texto visible
                'multiple' => true,
                //'expanded' => true, // ✅ true = checkboxes | false = <select multiple>
                'required' => false,
                'by_reference' => false,
                'label' => 'Medidas de proteccion implementadas por el equipo local',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'MEDIDA_PROTECCION')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
            ->add('gobloc16', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('gobloc16a', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador', // o el campo que muestre el texto visible
                'multiple' => true,
                //'expanded' => true, // ✅ true = checkboxes | false = <select multiple>
                'required' => false,
                'by_reference' => false,
                'label' => 'Instituciones con las que coordino el equipo local la implementacion de las medidas de proteccion de la victima en el contexto femicida ',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'GOBLOC_1_6a')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
           
            ->add('gobloc17', ChoiceType::class, [
                'label' => '¿El equipo local gestiono otras medidas de atencion integral respecto a la victima en el contexto femicida?',
                'choices' => [
                    'Sí' => 'si',
                    'No' => 'no',
                    'No se sabe' => 'no_se_sabe',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
            ->add('gobloc18', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador', // o el campo que muestre el texto visible
                'multiple' => true,
                //'expanded' => true, // ✅ true = checkboxes | false = <select multiple>
                'required' => false,
                'by_reference' => false,
                'label' => 'Medidas de atencion integral gestionadas por el equipo local respecto a la victima en contexto femicida',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'MEDIDA_INTEGRAL')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
           ->add('gobloc19', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador', // o el campo que muestre el texto visible
                'multiple' => true,
                //'expanded' => true, // ✅ true = checkboxes | false = <select multiple>
                'required' => false,
                'by_reference' => false,
                'label' => 'Medidas de atencion integral gestionadas por el equipo local respecto a la victima en contexto femicida',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'GOBLOC_19')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
         
            ->add('caso', EntityType::class, [
                'class' => Caso::class,
                'choice_label' => 'id_caso',
                'attr'=>[ 'style' => 'display:none;'], // Esto sí oculta el campo]
                'row_attr' => [
                    'style' => 'display:none;', // Oculta también el label y errores
                ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GobLocales::class,
        ]);
    }
}
