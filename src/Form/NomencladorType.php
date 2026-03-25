<?php

namespace App\Form;

use App\Entity\Nomenclador;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NomencladorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomenclador', TextType::class, [
                'label' => 'Tipo',
                'attr' => [
                    'readonly' => true
                ]
            ])
            ->add('valor_nomenclador', TextType::class, [
                'label' => 'Valor'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Nomenclador::class,
        ]);
    }
}