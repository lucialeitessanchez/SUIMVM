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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CajType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
            ->add('caj_1a', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('caj_1b', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha de la consulta', 
                'required' => false,
                ])
              
            ->add('caj_1c', EntityType::class, array(
                'required' => false,
                'label' => 'Motivo de la consulta',
                'multiple' => false,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'TIPO_CONSULTA')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
            /*
            ->add('caj_1d', EntityType::class, array(
                'required' => false,
                'label' => 'Tipo de asistencia brindada',
                'multiple' => false,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'TIPO_TRATAMIENTO')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))*/
            ->add('tipoAsistenciasBrindadas', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'multiple' => true,
                'required' => false,
                'by_reference' => false,
                'label' => 'Tipo de asistencia brindada',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'TIPO_TRATAMIENTO')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
            ->add('caj_2a', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('caj_2b', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('caj_2c', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha de patrocinio', 
                'required'=>false,
                ])

            ->add('caj_2d', ChoiceType::class, [
                  'label' => 'Estado actual del patrocinio',
                  'placeholder' => 'Seleccione...',
                  'choices' => [
                        'activo' => 'Activo',
                        'finalizado' => 'Finalizado',                       
                    ],
                  'required' => false,
                ])
            ->add('caj_2e', TextareaType::class, [
                   'label' => 'Resultado del patrocinio',
                   'required'=>false,
                    ])
            ->add('caj_2f', ChoiceType::class, [
                'label' => 'Especificar la razón de no aceptación del patrocinio',
                'placeholder' => 'Seleccione...',
                'choices' => [
                      'No se pudo establecer contacto' => 'No se pudo establecer contacto',
                      'Optó por patrocinio privado' => 'Optó por patrocinio privado',  
                      'No quiso presentarse como querellante'=>'No quiso presentarse como querellante',                     
                      'Otro'=>'Otro',
                  ],
                'required' => false,
              ])
            ->add('caj_3i', EntityType::class, [
                'class' => EquipoReferencia::class,
                'label' => '¿Cómo llegó el caso al CAJ?',
                'choice_label' => 'equipo', // ajusta según tu entidad
                'required' => false,
            ])
  
            ->add('caj_3j', EntityType::class, array(
                    'required' => false,
                    'label' => 'Tipo hecho',
                    'multiple' => false,
                    'choice_label' => 'valor_nomenclador',
                    'placeholder' => 'Seleccione',
                    'class' => Nomenclador::class,
                    'query_builder' => function ($repositorio) {
                        return $repositorio->createQueryBuilder('n')
                        ->where('n.nomenclador = :nomenclador')
                        ->setParameter('nomenclador', 'TIPO_HECHO')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                    }
                ))   
            ->add('caj_3a', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            /*
            ->add('caj_3b', EntityType::class, array(
                'required' => false,
                'label' => 'Tipo de asistencia proporcionada al grupo familiar',
                'multiple' => false,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'MEDIDA_PROTECCION')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))*/

            ->add('asistenciasProporcionadas', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'multiple' => true,
                'required' => false,
                'by_reference' => false,
                'label' => 'Tipo de asistencia proporcionada al grupo familiar',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'MEDIDA_PROTECCION')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
            ->add('caj_3c', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
          
            ->add('caj_3d', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('caj_3e', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha inicio del patrocinio', 
                'required'=>false,
                ])
            ->add('caj_3f', ChoiceType::class, [
                    'label' => 'Estado actual del patrocinio',
                    'placeholder' => 'Seleccione...',
                    'choices' => [
                          'activo' => 'Activo',
                          'finalizado' => 'Finalizado',                       
                      ],
                    'required' => false,
                  ])
           
            ->add('caj_3g', TextareaType::class, [
                'label' => 'Resultados obtenidos',
                'required'=>false,
                 ])
            ->add('caj_3h', ChoiceType::class, [
                'label' => 'Especificar la razón de no aceptación del patrocinio',
                'placeholder' => 'Seleccione...',
                'choices' => [
                      'No se pudo establecer contacto' => 'No se pudo establecer contacto',
                      'Optó por patrocinio privado' => 'Optó por patrocinio privado',  
                      'No quiso presentarse como querellante'=>'No quiso presentarse como querellante',                     
                      'Otro'=>'Otro',
                  ],
                'required' => false,
              ])
          
            ->add('caj_4a', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('caj_4b', RangeType::class, [
                'label' => '¿Las intervenciones contribuyeron a la protección y asistencia efectiva de la víctima y su familia?',
                'attr' => [
                    'min' => 0,
                    'max' => 2,
                    'step' => 1,
                    'class' => 'form-range', // Bootstrap 5
                  
                ],
                'required' => false,
            ])

            ->add('caj_4c', TextareaType::class, [
                'label' => 'Observaciones y recomendaciones para mejorar futuras intervenciones',
                'required'=> false,
            ])
            ->add('archivo',FileType::class, [
                'label' =>'Subir archivos',
                'multiple' => true,
                'mapped' => false,
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Caj::class,
        ]);
    }
}
