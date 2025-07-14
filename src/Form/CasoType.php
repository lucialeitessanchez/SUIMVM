<?php

namespace App\Form;

use App\Entity\Caso;
use App\Entity\Localidad;
use App\Entity\Nomenclador;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CasoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          /*  ->add('nombre', TextType::class, [
                'label' => 'Nombre',
            ])*/
            
            ->add('fechaCarga', DateType::class, [
                'label' => 'Fecha de Ingreso',
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('fechaHecho', DateType::class, [
                'label' => 'Fecha del hecho',
                'widget' => 'single_text',
                'required' => false,
                
            ])
            ->add('fechaAnoticiamiento', DateType::class, [
                'label' => 'Fecha de anoticiamiento del hecho',
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('edad',IntegerType::class, [
                'label' => 'Edad',
                'required' => false,
            ])

            ->add('femicidioVinculado', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('crimenOdio', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('tipoMuerte', ChoiceType::class, [
                'label' => 'Tipo de muerte',
                'placeholder' => 'Seleccione...',
                'choices' => [
                    'Muerte violenta por intervención de un tercero' => 'Muerte violenta por intervención de un tercero',
                    'Suicidio' => 'Suicidio',
                    'Muerte dudosa' => 'Muerte dudosa',
                    'Femicidio íntimo o familiar' =>  'Femicidio íntimo o familiar',
                    'Muerte en contexto de criminalidad organizada' => 'Muerte en contexto de criminalidad organizada',
                ],
                'required' => false,
            ])
            //'Muerte violenta por intervención de un tercero','Suicidio','Muerte dudosa', 'Femicidio íntimo o familiar','Muerte en contexto de criminalidad organizada'
            ->add('lugarHecho', TextType::class, [
                'label' => 'Lugar del hecho',
                'required' => false,
            ])
            ->add('domicilio', TextType::class, [
                'label' => 'Domicilio de la víctima',
                'required' => false,
            ])
            ->add('barrio', TextType::class, [
                'label' => 'Barrio del hecho',
                'required' => false,
            ])
            ->add('franjaEtaria', TextType::class, [
                'label' => 'Franja Etarea',
                'required' => false,
               
            ])
            ->add('lugarHechoNomenclador', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador',
                'placeholder' => 'Seleccione...',
                'required' => false,
                'label'=>'Lugar del hecho',
                    'query_builder' => function ($repo) {
                        return $repo->createQueryBuilder('n')
                            ->where('n.nomenclador = :clave')
                            ->setParameter('clave', 'TIPO_LUGAR')
                            ->orderBy('n.valor_nomenclador', 'ASC');
                    },
            ])
            
            ->add('localidad', EntityType::class, array(
                'required' => true,
                'label' => 'Localidad del hecho',
                'multiple' => false,
                'choice_label' => 'localidad',
                'placeholder' => 'Todos',
                'class' => Localidad::class,
                'query_builder' => function ($repositorio) {
                    return $repositorio->createQueryBuilder('l')->orderBy('l.localidad', 'ASC');
                }
            ))
       
            ;

            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Caso::class,
        ]);
    }
}
