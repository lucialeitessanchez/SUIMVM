<?php

namespace App\Form;

use App\Entity\Caso;
use App\Entity\Mpa;
use App\Entity\Nomenclador;
use PhpParser\Lexer\TokenEmulator\ReadonlyTokenEmulator;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class MpaForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('mpa_1', EntityType::class, array(
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
            ->add('mpa_2', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('mpa_3', ChoiceType::class, [
                'label' => 'Tipo de femicidio',
                'placeholder' => 'Seleccione...',
                'choices' => [
                    'Intimo' => 'Intimo',
                    'Familiar' => 'Familiar',
                    'Sexual'=>'Sexual',
                    'En contexto de criminalidad organizada'=>'En contexto de criminalidad organizada',
                    'Otras muertes relacionadas a violencia de genero' => 'Otras muertes relacionadas a violencia de genero',
                    'Conflictos interpersonales' => 'Conflictos interpersonales',
                    'En ocasion de robo'=>'En ocasion de robo',
                    'En investigacion'=>'En investigacion',
                ],
                'required' => false,
            ])
            ->add('mpa_3a', ChoiceType::class, [
                'label' => 'Tipo de incidente',
                'placeholder' => 'Seleccione...',
                'choices' => [
                    'Tiroteo' => 'Tiroteo',
                    'Ataque dirigido' => 'Ataque dirigido',
                    'Incendio'=>'Incencio',
                    'Error de indentidad'=>'Error de indentidad',
                    'Error de domicilio' => 'Error de domicilio',
                ],
                'required' => false,
            ])
          // ->add('mpa_3a1')
            ->add('mpa_3b', ChoiceType::class, [
                'label' => 'Circunstancia del ataque',
                'placeholder' => 'Seleccione...',
                'choices' => [
                    'Conflicto territorial' => 'Conflicto territorial',
                    'Control de narcotrafico' => 'Control de narcotrafico',
                    'Error de identidad'=>'Error de identidad',
                    'Error de domicilio' => 'Error de domicilio',
                ],
                'required' => false,
            ])
         //   ->add('mpa_3b1')
            ->add('mpa_4', ChoiceType::class, [
                'label' => 'Otros detalles del contexto',
                'placeholder' => 'Seleccione...',
                'choices' => [
                    'Tortura' => 'Tortura',
                    'Existencia de violencia sexual' => 'Existencia de violencia sexual',
                    'Privacion ilegitima de la libertad'=>'Privacion ilegitima de la libertad',
                    'Violencia en contexto de grupo de hombres' => 'Violencia en contexto de grupo de hombres',
                    'Signos de violencia simbolica'=>'Signos de violencia simbolica',
                    'Traslado al extranjero o ciudad lejana'=>'Traslado al extranjero o ciudad lejana',
                    'Incomunicacion de la victima respecto a su entorno'=>'Incomunicacion de la victima respecto a su entorno',
                    'Suministro de estupefacientes'=>'Suministro de estupefacientes',
                    'Homicidio sin cuerpo / cuerpo desechado'=>'Homicidio sin cuerpo / cuerpo desechado',
                    'Violencia excesiva'=>'Violencia excesiva',
                    'Mas de un procedimiento homicida'=>'Mas de un procedimiento homicida',
                ],
                'required' => false,
            ])
              ->add('mpa_5', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha de encuentro del cuerpo', 
                'required' => false,
                ])
            ->add('mpa_6', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha de fallecimiento', 
                'required' => false,
                ])
            ->add('mpa_6a', TextType::class, [
                 'label' => 'Dia de la semana',
                 'required' => false,
                 'attr' => ['readonly' => true],
                ])
           ->add('mpa_6b', TimeType::class, [
                'widget' => 'single_text',
                'label' => 'Hora',
                'input' => 'datetime', // o 'string' si prefieres un string en lugar de un objeto DateTime
                'with_seconds' => false, // opcional, si no quieres los segundos
                'required' => false,
            ])
          //  ->add('mpa_6c')
            ->add('mpa_6c', TextType::class, [
                'label' => 'Franja horaria',
                'required' => false,
                'attr' => ['readonly' => true],
                
            ])
            ->add('mpa_7', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
                'label'=>'Lugar del hecho',
                    'query_builder' => function ($repo) {
                        return $repo->createQueryBuilder('n')
                            ->where('n.nomenclador = :clave')
                            ->setParameter('clave', 'TIPO_LUGAR')
                            ->orderBy('n.valor_nomenclador', 'ASC');
                    },
            ])
            ->add('mpa_7a', TextareaType::class, [
                   'label' => 'Otra informacion relevante',
                   'required'=>false,
                    ])           
            ->add('mpa_8', CheckboxType::class, [//contexto de otros delitos
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('mpa_9a', TextType::class, [
                'label' => 'Nombre y Apellido',
                'required'=>false,
                    ])     
            ->add('mpa_9b',IntegerType::class, [
                    'label' => 'Edad',
                    'required' => false,
                ])
        
                ->add('mpa_9c', EntityType::class, [
                    'class' => Nomenclador::class,
                    'label' => 'Tipo vinculo',
                    'placeholder' => 'Seleccione',
                    'required'=>false,
                    'query_builder' => function ($repo) {
                        return $repo->createQueryBuilder('n')
                            ->where('n.nomenclador = :clave')
                            ->setParameter('clave', 'TIPO_VINCULO')
                            ->orderBy('n.valor_nomenclador', 'ASC');
                    },
            ])   
            ->add('mpa_9d', CheckboxType::class, [//miembro fuerza seguridad
                    'label' => 'No / Sí',
                    'required' => false,
                    'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                    'label_attr' => ['class' => 'form-check-label'],
                ])
            ->add('mpa_9e', CheckboxType::class, [//posee armas de fuego
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
                ])
            ->add('mpa_9f', CheckboxType::class, [//antecedentes de violencia
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
                ])
             ->add('mpa_9g', CheckboxType::class, [//antecedentes por delitos contra inseguridad fisica
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
                ])
             ->add('mpa_9h', CheckboxType::class, [//antecedentes por otros delitos 
                    'label' => 'No / Sí',
                    'required' => false,
                    'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                    'label_attr' => ['class' => 'form-check-label'],
                 ])
             ->add('mpa_9ha', TextType::class, [
                    'label' => 'Cual antecedente',
                    'required'=>false,
                 ])  
            ->add('mpa_10', CheckboxType::class, [//antecedentes por otros delitos 
                    'label' => 'No / Sí',
                    'required' => false,
                    'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                    'label_attr' => ['class' => 'form-check-label'],
                 ])
            ->add('mpa_11', ChoiceType::class, [
                    'label' => 'Destinatario principal del ataque',
                    'placeholder' => 'Seleccione...',
                    'choices' => [
                        'Victima' => 'Victima',
                        'Familia de la victima' => 'Familia de la victima',
                        ],
                    'required' => false,
                ])    
           /* ->add('mecanicasDelHecho', ChoiceType::class, [
                    'label' => 'Mecánica del hecho',
                    'placeholder' => 'Seleccione...',
                    'multiple'=>true,
                    'choices' => [
                       'Arma de fuego' => 'arma de fuego',
                        'Arma blanca' => 'arma blanca',
                        'Ahorcamiento' =>'ahorcamiento',
                        'Asfixia'=>'asfixia',
                        'Golpes con objetos'=>'golpes con objetos',
                        'Golpes con objetos contundentes'=>'golpes con objetos contundentes',
                        'Golpes de puño'=>'golpes de puño',
                        'Quemaduras'=>'quemaduras',
                        'Otros medios'=>'otros medios',
                        'Sin determinar'=>'sin determinar',
                        ],
                    'required' => false,
                ])     */
                ->add('mecanicasDelHecho', EntityType::class, array(
                    'required' => false,
                    'label' => 'Mecanica del hecho',
                    'multiple' => true,
                    'choice_label' => 'valor_nomenclador',
                    'placeholder' => 'Seleccione',
                    'class' => Nomenclador::class,
                    'query_builder' => function ($repositorio) {
                        return $repositorio->createQueryBuilder('n')
                        ->where('n.nomenclador = :nomenclador')
                        ->setParameter('nomenclador', 'MECANICA_HECHO')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                    }
                ))           
              /*  ->add('otrasViolencias', ChoiceType::class, [
                    'label' => 'Otras expresiones de violencia',
                    'placeholder' => 'Seleccione...',
                    'multiple'=>true,
                    'choices' => [
                       'Tortura' => 'Tortura',
                        'Existencia de violencia sexual' => 'Existencia de violencia sexual',
                        'Privacion ilegitima de la libertad' =>'Privacion ilegitima de la libertad',
                        'Violencia en contexto de grupo de hombres'=>'Violencia en contexto de grupo de hombres',
                        'Signos de violencia simbolica'=>'Signos de violencia simbolica',
                        'Traslado al extranjero o a ciudad lejana'=>'Traslado al extranjero o a ciudad lejana',
                        'Incomunicacion de la victima'=>'Incomunicacion de la victima',
                        'Suministro de estupefacientes'=>'Suministro de estupefacientes',
                        'Homicidios sin cuerpo'=>'Homicidios sin cuerpo',
                        'Cuerpo desechado'=>'Cuerpo desechado',
                        'Violencia excesiva'=>'Violencia excesiva',
                        'Más de un procedemiento homicida'=>'Más de un procedemiento homicida'
                       ],
                    'required' => false,
                  ])  */
                  ->add('otrasViolencias', EntityType::class, array(
                    'required' => false,
                    'label' => 'Otras expresiones de violencia',
                    'multiple' => true,
                    'choice_label' => 'valor_nomenclador',
                    'placeholder' => 'Seleccione',
                    'class' => Nomenclador::class,
                    'query_builder' => function ($repositorio) {
                        return $repositorio->createQueryBuilder('n')
                        ->where('n.nomenclador = :nomenclador')
                        ->setParameter('nomenclador', 'OTRA_VIOLENCIA')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                    }
                ))
                 
                ->add('mpa_13a', TextareaType::class, [
                    'label' => 'Que tipo de violencia excesiva',
                    'required'=>false,
                     ])           
                ->add('mpa_14', TextareaType::class, [
                        'label' => 'Conducta del agresor posterior al femicidio',
                        'required'=>false,
                     ])      
           
                ->add('mpa_15', CheckboxType::class, [//existencia hechos previos
                        'label' => 'No / Sí',
                        'required' => false,
                        'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                        'label_attr' => ['class' => 'form-check-label'],
                     ])

                ->add('tiposViolencias', EntityType::class, [
                        'class' => Nomenclador::class,
                        'choice_label' => 'valor_nomenclador', // o el campo que muestre el texto visible
                        'multiple' => true,
                        //'expanded' => true, // ✅ true = checkboxes | false = <select multiple>
                        'required' => false,
                        'by_reference' => false,
                        'label' => 'Tipos de violencia',
                        'query_builder' => function ($repo) {
                            return $repo->createQueryBuilder('n')
                                ->where('n.nomenclador = :clave')
                                ->setParameter('clave', 'TIPO_VIOLENCIA')
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
                ])
                ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mpa::class,
            'nomencladores_vinculo' => [], // por defecto vacío
        ]);
    }
}
