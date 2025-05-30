<?php

namespace App\Form;

use App\Entity\Caso;
use App\Entity\Mpa;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class MpaForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('mpa_1', ChoiceType::class, [
                'label' => 'Tipo de muerte',
                'placeholder' => 'Seleccione...',
                'choices' => [
                    'Suicidio' => 'Suicidio',
                    'Muerte dudosa' => 'Muerte dudosa',
                    'Femicidio'=>'Femicidio',
                    'Travesticidio'=>'Travesticidio',
                    'Transfemicidio' => 'Transfemicidio',
                    'Tentativa de femicidio' => 'Tentativa de femicidio',
                ],
                'required' => true,
            ])
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
                    'Sexual'=>'Sexualo',
                    'En contexto de criminalidad organizada'=>'En contexto de criminalidad organizada',
                    'Otras muertes relacionadas a violencia de genero' => 'Otras muertes relacionadas a violencia de genero',
                    'Conflictos interpersonales' => 'Conflictos interpersonales',
                    'En ocasion de robo'=>'En ocasión de robo',
                    'En investigacion'=>'En investigación',
                ],
                'required' => true,
            ])
          
       
            ->add('mpa_3a', ChoiceType::class, [
                'label' => 'Tipo de incidente',
                'placeholder' => 'Seleccione...',
                'choices' => [
                    'Tiroteo' => 'Tiroteo',
                    'Ataque dirigido' => 'Ataque dirigido',
                    'Incendio'=>'Incencio',
                    'Error de identidad'=>'Error de identidad',
                    'Error de domicilio' => 'Error de domicilio',
                ],
                'required' => true,
            ])
          // ->add('mpa_3a1')
            ->add('mpa_3b', ChoiceType::class, [
                'label' => 'Circunstancia del ataque',
                'placeholder' => 'Seleccione...',
                'choices' => [
                    'Conflicto territorial' => 'Tiroteo',
                    'Control de narcotrafico' => 'Ataque dirigido',
                    'Error de identidad'=>'Incencio',
                    'Error de domicilio' => 'Error de domicilio',
                ],
                'required' => true,
            ])
            
          
            ->add('mpa_3b1')
            ->add('mpa_4')
            ->add('mpa_5')
            ->add('mpa_6')
            ->add('mpa_6a')
            ->add('mpa_6b')
            ->add('mpa_6c')
            ->add('mpa_7')
            ->add('mpa_7a')
            ->add('mpa_8')
            ->add('mpa_9a')
            ->add('mpa_9b')
            ->add('mpa_9c')
            ->add('mpa_9d')
            ->add('mpa_9e')
            ->add('mpa_9f')
            ->add('mpa_9g')
            ->add('mpa_9h')
            ->add('mpa_9ha')
            ->add('mpa_10')
            ->add('mpa_11')
            ->add('mpa_12')
            ->add('mpa_13')
            ->add('mpa_13a')
            ->add('mpa_14')
            ->add('mpa_15')
            ->add('caso', EntityType::class, [
                'class' => Caso::class,
                'choice_label' => 'id_caso',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mpa::class,
        ]);
    }
}
