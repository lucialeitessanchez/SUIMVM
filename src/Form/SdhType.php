<?php
namespace App\Form;

use App\Entity\SDH;
use App\Entity\Nomenclador;
use App\Entity\Caso;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SdhType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
   
            ->add('sdh_1_1', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sdh_1_9', ChoiceType::class, [
                'label' => '¿En qué condición?',
                'placeholder' => 'Seleccione...',
                'choices' => [
                      'Victima' => 'Victima',
                      'Victimaria' => 'Victimaria',                       
                  ],
                'required' => false,
              ])
            ->add('sdh_1_10', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha de intervención de la Secretaria en la causa', 
                'required' => false,
            ])
            ->add('sdh_1_2_id_nomenclador', EntityType::class, array(
                'required' => false,
                'label' => 'Tipo de trata detectada',
                'multiple' => true,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'TIPO_TRATA')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
            ->add('sdh_1_3', ChoiceType::class, [
                'label' => '¿Se concretó la explotación?',
                'placeholder' => 'Seleccione...',
                'choices' => [
                      'Si' => 'Si',
                      'No' => 'No',    
                      'En proceso judicial'=>'En proceso judicial',                   
                  ],
                'required' => false,
              ])
            ->add('sdh_1_4', ChoiceType::class, [
                'label' => 'Tipo de trata en terminos de alcance geográfico',
                'placeholder' => 'Seleccione...',
                'choices' => [
                      'Interna' => 'Interna',
                      'Internacional' => 'Internacional',                       
                  ],
                'required' => false,
              ])
            ->add('sdh_1_5_id_nomenclador', EntityType::class, array(
                'required' => false,
                'label' => 'Instituciones que intervinieron en el caso de trata',
                'multiple' => false,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'INSTITUCION_INTERVINIENTE')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
            ->add('sdh_1_6_id_nomenclador', EntityType::class, array(
                'required' => false,
                'label' => 'Acciones de asistencia brindadas a la víctima',
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
            ))
            ->add('sdh_1_7', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch Hubo seguimiento
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sdh_1_8', TextareaType::class, [
                'required' => false,
                'label'=>'Especificar las instituciones',
                
                ])

            ->add('sdh_2_1', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sdh_2_2_id_nomenclador', EntityType::class, array(
                'required' => false,
                'label' => 'Tipo protección ofrecida',
                'multiple' => false,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'TIPO_TRATA')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
            ->add('sdh_2_3', ChoiceType::class, [
                'label' => 'Frecuencia de contacto y acompañamiento durante el proceso de asistencia',
                'placeholder' => 'Seleccione...',
                'choices' => [
                      'Semanal' => 'Semanal',
                      'Mensual' => 'Mensual',                       
                      'A solicitud de la victima'=>'A solicitud de la victima',
                  ],
                'required' => false,
              ])
            ->add('sdh_2_4', ChoiceType::class, [
                'label' => 'Duración del acompañamiento brindado',
                'placeholder' => 'Seleccione...',
                'choices' => [
                      'Menos de 3 meses' => 'Menos de 3 meses',
                      '3-6 meses' => '3-6 meses',                       
                      '6-12 meses'=>'6-12 meses',
                      'Mas de 1 año'=>'Mas de 1 año',
                  ],
                'required' => false,
              ])
            ->add('sdh_3_1', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sdh_3_2', ChoiceType::class, [
                'label' => 'Duración de la desaparición',
                'placeholder' => 'Seleccione...',
                'choices' => [
                      'Menos de 1 dia' => 'Menos de 1 dia',
                      'Mas de 1 semana' => 'Mas de 1 semana',                       
                      'Mas de 1 mes'=>'Mas de 1 mes',
                  ],
                'required' => false,
              ])
            ->add('sdh_3_3_id_nomenclador', EntityType::class, array(
                'required' => false,
                'label' => 'Medidas adoptadas para la búsqueda de la víctima',
                'multiple' => false,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'MEDIDA_PARA_BUSQUEDA')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
            ->add('sdh_3_4_id_nomenclador', EntityType::class, array(
                'required' => false,
                'label' => 'Instituciones involucradas en la busqueda',
                'multiple' => false,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'INSTITUCION_INTERVINIENTE')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
            ->add('sdh_4_1', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sdh_4_2', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sdh_4_3', TextareaType::class, [
                'required' => false,
                'label'=>'Medidas específicas aplicadas de las que tomó conocimiento la Secretaria',
                ])
            ->add('sdh_5_1a', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sdh_5_1b', TextareaType::class, [
                'required' => false,
                'label'=>'Especificar obstáculos',
                ])
          
            ->add('sdh_5_2a', RangeType::class, [
                'label' => '¿Se lograron reducir los riesgos para la víctima mediante las intervenciones?',
                'attr' => [
                    'min' => 0,
                    'max' => 2,
                    'step' => 1,
                    'class' => 'form-range', // Bootstrap 5
                  
                ],
                'required' => false,
            ])
            ->add('sdh_5_2b', TextareaType::class, [
                'required' => false,
                'label'=>'Lecciones aprendidas y recomendaciones para casos futuros',
                ])
            ->add('caso_id_caso', EntityType::class, [
                    'class' => Caso::class,
                    'choice_label' => 'id_caso',
                    'attr'=>[ 'style' => 'display:none;'], // Esto sí oculta el campo]
                    'row_attr' => [
                        'style' => 'display:none;', // Oculta también el label y errores
                    ]
                    ]);    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SDH::class,
        ]);
    }
}
