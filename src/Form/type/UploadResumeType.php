<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 18:12
 */

namespace App\Form\type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;

class UploadResumeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
           ->add('resume', FileType::class,[
               'label' => 'Curiculum Vitae (PDF file)',
               'constraints' => [
                   new File([
                       'maxSize' => '2048k',
                       'mimeTypes' => [
                           'application/pdf',
                           'application/x-pdf',
                       ],
                       'mimeTypesMessage' => 'Veuillez choisir un fichier valide',
                   ])
               ],
           ]);
    }
}