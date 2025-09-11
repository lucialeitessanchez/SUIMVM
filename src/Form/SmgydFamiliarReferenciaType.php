<?php

namespace App\Form;

use App\Entity\SmgydFamiliarReferencia;
use App\Entity\Nomenclador;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

Class SmgydFamiliarReferenciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apenom', TextType::class, [
                'label' => 'Apellido y nombre',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            
            ->add('edad', IntegerType::class, [
                'required' => false,
            ])
            ->add('vinculo', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'TIPO_VINCULO')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SmgydFamiliarReferencia::class,
        ]);
    }
}
