<?php

namespace App\Form;

use App\Entity\Pgcsj;
use App\Entity\Caso;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('pgcsj4', IntegerType::class, ['required' => false])
            
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
            ->add('pgcsj7', TextType::class, ['required' => false])
            ->add('pgcsj8', DateType::class, ['required' => false, 'widget' => 'single_text'])
            ->add('pgcsj9', DateType::class, ['required' => false, 'widget' => 'single_text'])
            
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
            ->add('pgcsj14', TextType::class, ['required' => false])
            ->add('pgcsj15', TextareaType::class, ['required' => false])

            ->add('pgcsj_3', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'nombre', // ajustalo según el campo visible
                'multiple' => true,
                'expanded' => false, // true si querés checkboxes
                'required' => false,
                'label' => 'PGCSJ 3',
                'attr' => ['class' => 'form-select', 'size' => 5], // estilo Bootstrap
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
