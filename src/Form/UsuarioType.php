<?php
namespace App\Form;

use App\Entity\Usuario;
use App\Entity\Rol;
use App\Entity\Organismo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('usuaemail', EmailType::class, [
                'label' => 'Email',
            ])
            ->add('usuanombre', TextType::class, [
                'label' => 'Nombre',
            ])
            ->add('usuaapellido', TextType::class, [
                'label' => 'Nombre',
            ])
            ->add('roles', EntityType::class, [
                'class' => Rol::class,
                'choice_label' => 'rolId',
                'multiple' => true,
                'expanded' => true, // checkboxes
                'label' => 'Roles',
            ])
            ->add('activo', CheckboxType::class, [
                'label' => 'Activo',
                'required' => false,
            ])

            ->add('organismo', EntityType::class, [
                'class' => Organismo::class,
                'choice_label' => 'nombreOrganismo',
                'multiple' => false,
                'expanded' => false, // checkboxes
                'label' => 'Organismo',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}
