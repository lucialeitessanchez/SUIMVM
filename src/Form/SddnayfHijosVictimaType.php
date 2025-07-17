<?php
namespace App\Form;

use App\Entity\SddnayfHijosVictima;
use App\Entity\Nomenclador;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SddnayfHijosVictimaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('apenom', TextType::class, ['required' => false])
            ->add('fnac', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('nrodocu', TextType::class, ['required' => false])
            ->add('vinculoAgresor', IntegerType::class, ['required' => false])
            ->add('sddnayf3a', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])      
            ->add('sddnayf3d', EntityType::class, [
                    'class' => Nomenclador::class,
                    'label' => 'Indique sede del OA que adopto la MPE',
                    'multiple' => false,
                    'choice_label' => 'valorNomenclador',
                    'required' => false,
                    'query_builder' => function ($repositorio) {
                        return $repositorio->createQueryBuilder('n')
                        ->where('n.nomenclador = :nomenclador')
                        ->setParameter('nomenclador', 'SEDE_SDDNAyF')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                    }
                ])    
            
            ->add('sddnayf3fa', DateType::class, [
                'widget' => 'single_text',
                'label'=>'Fecha inicio de la MPE',
                'required' => false,
            ])
            ->add('sddnayf3fb', DateType::class, [
                'widget' => 'single_text',
                'label'=>'Fecha inicio de la MPE',
                'required' => false,
            ])
            
            ->add('sddnayf3g', EntityType::class, array(
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
            ->add('sddnayf3h', EntityType::class, array(
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
            ->add('sddnayf3i', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])            
            ->add('sddnayf3j', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])            
            ->add('sddnayf3k', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            // ManyToMany con nomenclador
            ->add('sddnayf3b', EntityType::class, [
                'class' => Nomenclador::class,
                'label'=>'Indique tipo de intervencion recibida',
                'multiple' => true,
                'choice_label' => 'valorNomenclador',
                'required' => false,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'TIPO_INTERVENCION')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }

            ])
            ->add('sddnayf3c', EntityType::class, [
                'class' => Nomenclador::class,
                'label' => 'Motivo de la Medida de Proteccion',
                'multiple' => true,
                'choice_label' => 'valorNomenclador',
                'required' => false,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'MOTIVO_MEDIDA_PROTECCION')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ])
            ->add('sddnayf3e', EntityType::class, [
                'class' => Nomenclador::class,
                'label' => 'Trayectoria de alojamiento durante la medida',
                'multiple' => true,
                'choice_label' => 'valorNomenclador',
                'required' => false,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'TRAYECTORIA_ALOJAMIENTO')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ])
            ->add('sddnayf3l', EntityType::class, [
                'class' => Nomenclador::class,
                'label' => 'Tipo de intervencion recibida',
                'multiple' => true,
                'choice_label' => 'valorNomenclador',
                'required' => false,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('n')
                    ->where('n.nomenclador = :nomenclador')
                    ->setParameter('nomenclador', 'TIPO_INTERVENCION')
                    ->orderBy('n.valor_nomenclador', 'ASC');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SddnayfHijosVictima::class,
        ]);
    }
}
