<?php

namespace App\Form;

use App\Entity\SmgydProcesoJudicial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SmgydProcesoJudicialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fecha', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha',
                'required' => false,
            ])
            ->add('organismo', TextType::class, [
                'label' => 'Organismo',
                'required' => false,
            ])
            ->add('observaciones', TextareaType::class, [
                'label' => 'Observaciones',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SmgydProcesoJudicial::class,
        ]);
    }
}
