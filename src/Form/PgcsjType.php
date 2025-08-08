<?php

namespace App\Form;

use App\Entity\Pgcsj;
use App\Entity\Caso;
use App\Entity\Nomenclador;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PgcsjType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pgcsj1', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('pgcsj2', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            
            ->add('pgcsj4', ChoiceType::class, [
                'label' => '¿Antecedentes de violencia en la relación?',
                'choices' => [
                    'Si' => '1',
                    'No' => '0',
                    'No especificado' => '2',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
            ->add('pgcsj5', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            
            ->add('pgcsj6', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('pgcsj7', TextType::class, [
                'required' => false,
                'label'=>'Persona contra quien se interpuso la medida'
                ])

            ->add('pgcsj8', DateType::class, [
                'required' => false, 
                'widget' => 'single_text',
                'label'=>'Fecha de emision de la medida'
                ])
            ->add('pgcsj9', DateType::class, [
                'required' => false, 
                'widget' => 'single_text',
                'label'=>'Fecha de vencimiento de la medida'
                ])
            
            ->add('pgcsj10', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
           
            ->add('pgcsj12', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('pgcsj14', ChoiceType::class, [
                'label' => 'Estado del caso',
                'choices' => [
                    'En seguimiento' => 'En seguimiento',
                    'Cerrado' => 'Cerrado',
                    'Derivado' => 'Derivado',
                ],
                'expanded' => false, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
            ->add('pgcsj15', TextareaType::class, [
                'required' => false,
                'label'=>'Otros datos que se consideren de interes'
                ])

            ->add('pgcsj_3', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador', // ajustalo según el campo visible
                'multiple' => true,
                'expanded' => false, // true si querés checkboxes
                'required' => false,
                'label' => 'Especificar el tipo de medida otorgada según la Ley 26.485',
                'attr' => ['class' => 'form-select', 'size' => 5], // estilo Bootstrap
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'PGCSJ_TIPO_MEDIDA')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
            ->add('pgcsj_11', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador', // ajustalo según el campo visible
                'multiple' => true,
                'expanded' => false, // true si querés checkboxes
                'required' => false,
                'label' => 'Tipo de procedimientos asociados',
                'attr' => ['class' => 'form-select', 'size' => 5], // estilo Bootstrap
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'PGCSJ_TIPO_PROCEDIMIENTO')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
            ->add('pgcsj_13', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador', // ajustalo según el campo visible
                'multiple' => true,
                'expanded' => false, // true si querés checkboxes
                'required' => false,
                'label' => '¿Se instruyo la intervencion de otros equipos? Cuales?',
                'attr' => ['class' => 'form-select', 'size' => 5], // estilo Bootstrap
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'PGCSJ_13')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
            
          
          
         ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pgcsj::class,
        ]);
    }
}
