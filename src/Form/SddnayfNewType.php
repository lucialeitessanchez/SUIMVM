<?php
namespace App\Form;

use App\Entity\SddnayfNew;
use App\Entity\Nomenclador;
use App\Form\SddnayfHijosVictimaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SddnayfNewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // Campos simples
 
            ->add('sddnayf_1a', ChoiceType::class, [
                'label' => '¿El OA tuvo intervencion en su niñez y/o adolescencia?',
                'choices' => [
                    'Si' => 'Si',
                    'No' => 'No',
                    'No se sabe' => 'No se sabe',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
            ->add('sddnayf_1b', EntityType::class, array(
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
            ->add('sddnayf_1c', EntityType::class, array(
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
            ->add('sddnayf_1d', EntityType::class, array(
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
            ->add('sddnayf_1e', EntityType::class, array(
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
            ->add('sddnayf1fa', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
                'label'=>"Fecha inicio de la MPE"
                ])
            ->add('sddnayf1fb', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
                'label'=>"Fecha fin de la MPE"
                ])
            ->add('sddnayf_1g', EntityType::class, array(
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
            ->add('sddnayf_1h', EntityType::class, array(
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
            ->add('sddnayf_1i', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sddnayf_2a', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('sddnayf_2b', EntityType::class, [
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
            ->add('sddnayf_2c', EntityType::class, array(
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
            ->add('sddnayf_2d', EntityType::class, array(
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
            ->add('sddnayf_2e', EntityType::class, array(
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
            ->add('sddnayf_2fa', DateType::class, [
                'widget' => 'single_text', 
                'required' => false,
                'label'=>'Fecha inicio de la MPE',
                ])
            ->add('sddnayf_2fb', DateType::class, [
                'widget' => 'single_text', 
                'required' => false,
                'label'=>'Fecha fin de la MPE',
                ])
            ->add('sddnayf_2g', EntityType::class, array(
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
            ->add('sddnayf_2h', EntityType::class, array(
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
            ->add('sddnayf_2i', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
  
            // Hijos víctima
            ->add('hijosVictima', CollectionType::class, [
                'entry_type' => SddnayfHijosVictimaType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                 'label' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SddnayfNew::class,
        ]);
    }
}
