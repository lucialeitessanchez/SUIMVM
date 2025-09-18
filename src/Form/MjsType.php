<?php

namespace App\Form;

use App\Entity\Mjs;
use App\Entity\Nomenclador;
use App\Entity\Caso;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MjsType extends AbstractType
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
                        ->setParameter('clave', 'MJS_MOTIVO')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
        ])
          
            ->add('mjs_1b2', TextType::class, ['required' => false])
            ->add('mjs_1b3', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
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
                'required' => false, 'label'=>'Motivo',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'MJS_TIPO_TRATAMIENTO')
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
           
            ->add('mjs_1b5_c', TextareaType::class, [
                'label' => 'Especificar antecedentes',
                'required' => false,
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
           
            ->add('mjs_2a', CheckboxType::class, ['required' => false])
            ->add('mjs_2b', TextType::class, ['required' => false])
            ->add('mjs_2b1', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'descripcion',
                'placeholder' => 'Seleccione',
                'required' => false,
            ])
            ->add('mjs_2b2', TextType::class, ['required' => false])
            ->add('mjs_2b3', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('mjs_2b4', CheckboxType::class, ['required' => false])
            ->add('mjs_3a', CheckboxType::class, ['required' => false])
            ->add('mjs_3b', TextType::class, ['required' => false])
            ->add('mjs_3b1', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'descripcion',
                'placeholder' => 'Seleccione',
                'required' => false,
            ])
            ->add('mjs_4a', CheckboxType::class, ['required' => false])
            ->add('mjs_4b', TextareaType::class, ['required' => false])
            ;
         
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mjs::class,
        ]);
    }
}
