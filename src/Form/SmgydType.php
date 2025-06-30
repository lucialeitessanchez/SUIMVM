<?php

namespace App\Form;

use App\Entity\EquipoReferencia;
use App\Entity\Smgyd;
use App\Entity\Nomenclador;
use App\Form\SmgydFamiliarType;
use App\Form\SmgydOrganizacionType;
use App\Form\SmgydProcesoJudicialType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            
            ->add('smgyd2', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
                'label'=>'Condicion de vivienda de la victima',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'CONDICION_VIVIENDA')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
            ->add('smgyd3', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
                'label'=>'Situacion economica de la victima',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'SITUACION_LABORAL')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
            ->add('smgyd4', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
                'label'=>'Nivel educativo alcanzado',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'NIVEL_EDUCATIVO')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])   
            ->add('smgyd7', ChoiceType::class, [
                'label' => '¿Antecedentes de violencia en la relación?',
                'choices' => [
                    'Sí' => 'Si',
                    'No' => 'No',
                    'No se especificado' => 'No especificado',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
            ->add('smgyd8', ChoiceType::class, [
                'label' => '¿La victima estuvo alojada en casas protección?',
                'choices' => [
                    'Sí' => 'Si',
                    'No' => 'No',
                    'Desconocido' => 'Desconocido',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
            ->add('smgyd8a', ChoiceType::class, [
                'label' => 'Duración en la casa de proteccion',
                'placeholder' => 'Seleccione...',
                'choices' => [
                      'Menos de 1 dia' => 'Menos de 1 dia',
                      '1 a 7 dias' => '1 a 7 dias',
                      'Mas de 1 semana' => 'Mas de 1 semana',                       
                      'Mas de 1 mes'=>'Mas de 1 mes',
                  ],
                'required' => false,
              ])
            ->add('smgyd9', CheckboxType::class, [ //existencia de medidas
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('smgyd9a', CheckboxType::class, [ 
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('smgyd10', ChoiceType::class, [
                'label' => '¿Denuncias previas registradas?',
                'choices' => [
                    'Sí' => 'Si',
                    'No' => 'No',
                    'Desconocido' => 'Desconocido',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
            ->add('smgyd11', CheckboxType::class, [ 
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('smgyd12', CheckboxType::class, [ 
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('smgyd13', CheckboxType::class, [ 
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('smgyd14', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
                'label'=>'¿Que otros programas o prestaciones tenia?',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'TIPO_PROGRAMA')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ]) 
            ->add('smgyd15', ChoiceType::class, [
                'label' => 'Intervencion de la SMGyD',
                'choices' => [
                    'Sí' => 'Si',
                    'No' => 'No',
                    'En proceso' => 'En proceso',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
            ->add('smgyd15a', ChoiceType::class, [
                'label' => 'Intervencion del equipo de guardia de la SMGyD',
                'choices' => [
                    'Sí' => 'Si',
                    'No' => 'No',
                    'En proceso' => 'En proceso',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
            ->add('smgyd15b', ChoiceType::class, [
                'label' => 'Intervencion del ESPI',
                'choices' => [
                    'Sí' => 'Si',
                    'No' => 'No',
                    'En proceso' => 'En proceso',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
            ->add('smgyd15c', TextType::class, [
                'required' => false,
                'label'=>'¿Cual?'                
                ])
            ->add('smgyd16', ChoiceType::class, [
                    'label' => 'Activacion del protocolo de femicidios',
                    'choices' => [
                        'Sí' => 'Si',
                        'No' => 'No',
                        'Desconocido' => 'Desconocido',
                    ],
                    'expanded' => true, // Muestra como botones radio
                    'multiple' => false, // Solo se puede elegir una
                    'required' => false,
                    'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                    'label_attr' => ['class' => 'form-label'],
                    'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
                ])
            ->add('equipos', EntityType::class, [
                    'class' => EquipoReferencia::class,
                    'choice_label' => 'equipo', // o el campo que quieras mostrar
                    'multiple' => true,
                    'expanded' => false, // false = <select multiple>, true = checkboxes
                    'required' => false,
                    'label' => 'Equipos intervinientes',
                    'attr' => ['class' => 'form-select', 'multiple' => true],
            ])

            ->add('smgyd16b', TextType::class, [
                    'required' => false,
                    'label'=>'Fiscalia interviniente'
            ])
            ->add('smgyd16c', TextType::class, [
                'required' => false,
                'label'=>'Juzgado / Defensoría'
                ])

            ->add('smgyd17', ChoiceType::class, [
                    'label' => 'Ayudas economicas provinciales otorgadas',
                    'choices' => [
                        'Sí' => 'Si',
                        'No' => 'No',
                        'En proceso' => 'En proceso',
                    ],
                    'expanded' => true, // Muestra como botones radio
                    'multiple' => false, // Solo se puede elegir una
                    'required' => false,
                    'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                    'label_attr' => ['class' => 'form-label'],
                    'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
                ])

            ->add('smgyd18', CheckboxType::class, [ 
                    'label' => 'No / Sí',
                    'required' => false,
                    'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                    'label_attr' => ['class' => 'form-check-label'],
            ])

            ->add('smgyd19', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
                'label'=>'Estado de la causa judicial',
                    'query_builder' => function ($repo) {
                        return $repo->createQueryBuilder('n')
                            ->where('n.nomenclador = :clave')
                            ->setParameter('clave', 'ESTADO_CAUSA')
                            ->orderBy('n.valor_nomenclador', 'ASC');
                    },
            ])
            ->add('smgyd20', TextareaType::class, [
                'required' => false,
                'label'=>'Fuentes de informacion'
                ])
            ->add('smgyd21', TextareaType::class, [
                'required' => false,
                'label'=>'Observaciones adicionales'
                ])
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
