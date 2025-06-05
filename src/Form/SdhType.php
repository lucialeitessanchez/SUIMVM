<?php
namespace App\Form;

use App\Entity\SDH;
use App\Entity\Nomenclador;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SdhType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sdh_1_1', TextType::class)
            ->add('sdh_1_9', TextType::class)
            ->add('sdh_1_10', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])

            ->add('sdh_1_2_id_nomenclador', EntityType::class, array(
                'required' => false,
                'label' => 'Tipo de trata detectada',
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
            ->add('sdh_1_3', TextType::class)
            ->add('sdh_1_4', TextType::class, ['required' => false])

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

            ->add('sdh_1_7', TextType::class, ['required' => false])
            ->add('sdh_1_8', TextareaType::class, ['required' => false])
            ->add('sdh_2_1', TextType::class, ['required' => false])
            ->add('sdh_2_3', TextType::class, ['required' => false])
            ->add('sdh_2_4', TextType::class, ['required' => false])
            ->add('sdh_3_1', TextType::class, ['required' => false])
            ->add('sdh_3_2', TextType::class, ['required' => false])
            ->add('sdh_3_3', TextType::class, ['required' => false])
            ->add('sdh_3_4', TextType::class, ['required' => false])
            ->add('sdh_4_1', TextType::class, ['required' => false])
            ->add('sdh_4_2', TextType::class, ['required' => false])
            ->add('sdh_4_3', TextareaType::class, ['required' => false])
            ->add('sdh_5_1a', TextType::class, ['required' => false])
            ->add('sdh_5_1b', TextareaType::class, ['required' => false])
            ->add('sdh_5_2a', TextType::class, ['required' => false])
            ->add('sdh_5_2b', TextareaType::class, ['required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SDH::class,
        ]);
    }
}
