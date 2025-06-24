<?php

namespace App\Form;

use App\Entity\GobLocales;
use App\Entity\Caso;
use App\Entity\Nomenclador;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GobLocalesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gobloc11', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('gobloc12', EntityType::class, [
                'class' => Nomenclador::class,
                'choice_label' => 'valor_nomenclador', // o el campo que muestre el texto visible
                'multiple' => true,
                //'expanded' => true, // ✅ true = checkboxes | false = <select multiple>
                'required' => false,
                'by_reference' => false,
                'label' => 'Motivo del primer contacto del equipo local respecto a la victima en el contexto femicida ',
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('n')
                        ->where('n.nomenclador = :clave')
                        ->setParameter('clave', 'GOBLOC_1_2')
                        ->orderBy('n.valor_nomenclador', 'ASC');
                },
            ])
            
            ->add('gobloc13', ChoiceType::class, [
                'label' => 'Nivel de riesgo determinado por el equipo',
                'choices' => [
                    'Bajo' => 'Bajo',
                    'Medio' => 'Medio',
                    'Alto' => 'Alto',
                    'Crítico' => 'Crítico',
                ],
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('gobloc14', ChoiceType::class, [
                'label' => 'Tipo de apoyo brindado',
                'multiple' => true,
                'choices' => [
                    'Pedido de alojamiento en casa de protección' => 'Pedido de alojamiento en casa de protección',
                    "Derivacion a otros organismos"=>"Derivacion a otros organismos",
                    "Asesoria legal"=>"Asesoria legal",
                    "Acompañamiento economico-social"=>"Acompañamiento economico-social"
                    // Agregá más si hay
                ],
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('gobloc15', ChoiceType::class, [
                'label' => 'Medidas de protecion implementadas por el equipo local',
                'choices' => [
                    'Botón de emergencia' => 'Botón de emergencia',
                    'Prohibición de acercamiento' => 'Prohibición de acercamiento',
                    'Exorto de exclusion del hogar'=>'Exorto de exclusion del hogar'
                ],
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('gobloc16', CheckboxType::class, [
                'label' => 'No / Sí',
                'required' => false,
                'attr' => ['class' => 'form-check-input'], // Bootstrap switch
                'label_attr' => ['class' => 'form-check-label'],
            ])
            ->add('gobloc16a', ChoiceType::class, [
                'label' => 'Instituciones con las que coordino el equipo la implementacion de las medidas',
                'multiple'=>true,
                'choices' => [
                    'MPA' => 'MPA',
                    'Emergencia 911' => 'Emergencia 911',
                    'Juzgado de familia' => 'Juzgado de familia',
                    'CAJ'=>'CAJ',
                    // Más opciones si tenés
                ],
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
           
            ->add('gobloc17', ChoiceType::class, [
                'label' => '¿El equipo local gestiono otras medidas de atencion integral respecto a la victima en el contexto femicida?',
                'choices' => [
                    'Sí' => 'si',
                    'No' => 'no',
                    'No se sabe' => 'no_se_sabe',
                ],
                'expanded' => true, // Muestra como botones radio
                'multiple' => false, // Solo se puede elegir una
                'required' => false,
                'placeholder' => false, // 👈️ evita que Symfony agregue una opción vacía
                'label_attr' => ['class' => 'form-label'],
                'attr' => ['class' => 'form-check'], // se puede personalizar más en el Twig
            ])
            ->add('gobloc18', ChoiceType::class, [
                'label' => 'Medidas de atencion integral gestionadas por el equipo local',
                'choices' => [
                    'Atención psicológica' => 'Atención psicológica',
                    'Subsidio económico' => 'Subsidio económico',
                    'Asesoramiento legal'=>'Asesoramiento legal',
                    'Acompañamiento social'=>'Acompañamiento social',
                    // Más si hay
                ],
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
            ->add('gobloc19', ChoiceType::class, [
                'label' => 'Instituciones participes en la implementacion',
                'choices' => [
                    'Secretaría DDHH' => 'Secretaría DDHH',
                    'Centros territoriales de denuncia' => 'Centros territoriales de denuncia',
                    'Efectores de salud'=>'Efectores de salud',
                    'Comisaria de la mujer'=>'Comisaria de la mujer'
                    // Más si hay
                ],
                'placeholder' => 'Seleccione...',
                'required' => false,
            ])
         
            ->add('caso', EntityType::class, [
                'class' => Caso::class,
                'choice_label' => 'id_caso',
                'attr'=>[ 'style' => 'display:none;'], // Esto sí oculta el campo]
                'row_attr' => [
                    'style' => 'display:none;', // Oculta también el label y errores
                ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GobLocales::class,
        ]);
    }
}
