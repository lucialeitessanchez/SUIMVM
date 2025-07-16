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
            ->add('sddnayf3a', CheckboxType::class, ['required' => false])
            ->add('sddnayf3d', IntegerType::class, ['required' => false])
            ->add('sddnayf3fa', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('sddnayf3fb', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('sddnayf3g', IntegerType::class, ['required' => false])
            ->add('sddnayf3h', IntegerType::class, ['required' => false])
            ->add('sddnayf3i', CheckboxType::class, ['required' => false])
            ->add('sddnayf3j', CheckboxType::class, ['required' => false])
            ->add('sddnayf3k', CheckboxType::class, ['required' => false])

            // ManyToMany con nomenclador
            ->add('sddnayf3b', EntityType::class, [
                'class' => Nomenclador::class,
                'multiple' => true,
                'choice_label' => 'valorNomenclador',
                'required' => false,
            ])
            ->add('sddnayf3c', EntityType::class, [
                'class' => Nomenclador::class,
                'multiple' => true,
                'choice_label' => 'valorNomenclador',
                'required' => false,
            ])
            ->add('sddnayf3e', EntityType::class, [
                'class' => Nomenclador::class,
                'multiple' => true,
                'choice_label' => 'valorNomenclador',
                'required' => false,
            ])
            ->add('sddnayf3l', EntityType::class, [
                'class' => Nomenclador::class,
                'multiple' => true,
                'choice_label' => 'valorNomenclador',
                'required' => false,
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
