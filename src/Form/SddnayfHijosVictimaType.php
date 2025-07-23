<?php
namespace App\Form;

use App\Entity\SddnayfHijosVictima;
use App\Entity\Nomenclador;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class SddnayfHijosVictimaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Campos simples
            ->add('apenom', TextType::class, [
                'required' => false,
                'label' => 'Nombre del hijo/a',
            ])
            ->add('fnac', DateType::class, [
                'label' => 'Fecha de Nacimiento',
                'widget' => 'single_text',
                'required' => false,
            ])
       
            // ManyToOne (relación simple)
            ->add('vinculoAgresor', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'required' => false,
                'label' => 'Vínculo con el agresor',
            ])
            ->add('sddnayf3a', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sddnayf_3b', EntityType::class, array(
                'required' => false,
                'label' => 'Tipo de intervencion recibida',
                'multiple' => true,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'TIPO_INTERVENCION')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
            ->add('sddnayf_3c', EntityType::class, array(
                'required' => false,
                'label' => 'Motivo de la Medida de Proteccion',
                'multiple' => true,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'MOTIVO_MEDIDA_PROTECCION')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
            ->add('sddnayf_3d', EntityType::class, array(
                'required' => false,
                'label' => 'Indique sede del OA que adopto la MPE',
                'multiple' => false,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'SEDE_SDDNAyF')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
            ->add('sddnayf_3e', EntityType::class, array(
                'required' => false,
                'label' => 'Trayectoria de alojamiento durante la medida',
                'multiple' => true,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'TRAYECTORIA_ALOJAMIENTO')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
            ->add('sddnayf3fa', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
                'label'=>"Fecha inicio de la MPE"
                ])
            ->add('sddnayf3fb', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
                'label'=>"Fecha fin de la MPE"
                ])
            ->add('sddnayf_3g', EntityType::class, array(
                    'required' => false,
                    'label' => 'Motivo de resolucion de la MPE',
                    'multiple' => false,
                    'choice_label' => 'valor_nomenclador',
                    'placeholder' => 'Seleccione',
                    'class' => Nomenclador::class,
                    'query_builder' => function ($repositorio) {
                        return $repositorio->createQueryBuilder('n')
                        ->where('n.nomenclador = :nomenclador')
                        ->setParameter('nomenclador', 'MOTIVO_RESOLUCION_MEDIDA')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                    }
            ))
            
            ->add('sddnayf_3h', EntityType::class, array(
                'required' => false,
                'label' => 'Si corresponde, indique motivo de egreso del sistema',
                'multiple' => false,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'MOTIVO_EGRESO_SISTEMA')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
            ->add('sddnayf_3i', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sddnayf_3j', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sddnayf_3k', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            // ManyToMany (select múltiple)
            
            ->add('sddnayf_3l', EntityType::class, array(
                'required' => false,
                'label' => 'Tipo de intervencion',
                'multiple' => true,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione',
                'class' => Nomenclador::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'TIPO_INTERVENCION')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SddnayfHijosVictima::class,
        ]);
    }
}
