<?php

namespace App\Form;

use App\Entity\Mjs;
use App\Entity\Nomenclador;
use App\Entity\Caso;
use App\Entity\MjsServicioPenitenciario;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MjsServicioPenitenciarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('mjs_1a', CheckboxType::class, [ //existencia de medidas
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('mjs_1b1', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'required' => false,
                'label'=>'Motivo',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'MJS_SP_MOTIVO')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
        ])
          
            ->add('mjs_1b2', TextType::class, [
                'required' => false,
                'label'=>'Duracion de la condena'
                ])

            ->add('mjs_1b3', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
                'label'=>'Fecha de liberacion'
            ])
            
            ->add('mjs_1b4', CheckboxType::class, [ //existencia de medidas
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
                
            ])
            ->add('mjs_1b5_a', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'required' => false, 
                'label'=>'Tipo de tratamiento recibido ',                
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'MJS_SP_TIPO_TRATAMIENTO')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
               ])
           
            ->add('mjs_1b5_b', ChoiceType::class, [
                'label' => 'Cumplimiento',
                'choices' => [
                    'Completo' => 'Completo',
                    'Parcial' => 'Parcial',
                    'No cumplido' => 'No cumplido',
                    'Desconocido' => 'Desconocido',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
           
   
            ->add('mjs_1b5_c', ChoiceType::class, [
                'label' => 'Evaluacion de la conducta',
                'choices' => [
                    'Colaborador' => 'Colaborador',
                    'Conflictivo' => 'Conflictivo',
                    'Distante' => 'Distante',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
           
            ->add('mjs_2a', CheckboxType::class, [ //existencia de medidas
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
           
            
            ->add('mjs_2b1', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'required' => false, 
                'label'=>'Motivo de encarcelamiento',                
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'MJS_SP_MOTIVO_ENCARCELACION')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
               ])
            ->add('mjs_2b2', TextType::class, [
                'required' => false,
                'label'=>'Duracion de la condena'
                ])
            ->add('mjs_2b3', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
                'label'=>'Fecha de liberacion'
            ])
            ->add('mjs_2b4', CheckboxType::class, [ //existencia de medidas
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('mjs_3a', CheckboxType::class, [ //existencia de medidas
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])          
            ->add('mjs_3b', TextareaType::class, [
                'required' => false,
                'label'=>"Tratamiento e intervenciones asignados"
                ])
            ->add('mjs_4a', CheckboxType::class, [ //existencia de medidas
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('mjs_4b', TextareaType::class, [
                'required' => false,
                'label'=>"Opinion del equipo penitenciario sobre la posibilidad de reinsercion social del agresor"
                ])
            ;
            if (!$options['disabled']) {
                $builder->add('archivos', FileType::class, [
                    'label' => 'Subir Archivos',
                    'mapped' => false,
                    'multiple' => true,
                    'required' => false,
                ]);
            }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MjsServicioPenitenciario::class,
        ]);
    }
}
