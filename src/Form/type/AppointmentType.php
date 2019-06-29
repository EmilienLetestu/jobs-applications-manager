<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 21:47
 */

namespace App\Form\type;


use App\DTO\AppointmentDTO;
use App\Entity\Application;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AppointmentType
 * @package App\Form\type
 */
class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateStart', DateType::class,[
                'label' => 'Date du rendez-vous'
            ])
            ->add('startTime', TimeType::class,[
                'label'  => 'Heure de début du rendez-vous',
                'input'  => 'datetime',
                'widget' => 'choice',
            ])
            ->add('duration', TextType::class,[
                'label'  => 'Durée du rendez-vous',
            ])
            ->add('location', TextType::class,[
                'label'  => 'Durée du rendez-vous',
            ])
            ->add('lat', HiddenType::class)
            ->add('lng', HiddenType::class)
            ->add('application', EntityType::class,[
                'class' => Application::class,
                'choice_label' => 'application.company.name',
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults([
           'data_class'        => AppointmentDTO::class,
           'validation_groups' => ['createAppointment'],
           'empty_data'        => function(FormInterface $form){
                return new AppointmentDTO(
                    $form->get('dateStart')->getData(),
                    $form->get('startTime')->getData(),
                    $form->get('duration')->getData(),
                    $form->get('location')->getData(),
                    $form->get('lat')->getData(),
                    $form->get('lng')->getData(),
                    $form->get('application')->getData()
                );
           }
       ]);
    }
}