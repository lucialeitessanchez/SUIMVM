<?php

namespace App\Form;

class NomencladorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomenclador', TextType::class, [
                'label' => 'Tipo'
            ])
            ->add('valor_nomenclador', TextType::class, [
                'label' => 'Valor'
            ]);
    }
}