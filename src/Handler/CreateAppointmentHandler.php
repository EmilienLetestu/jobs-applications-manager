<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 21:10
 */

namespace App\Handler;


use App\Handler\Interfaces\CreateAppointmentHandlerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class CreateAppointmentHandler
 * @package App\Handler
 */
class CreateAppointmentHandler implements CreateAppointmentHandlerInterface
{
   public function handle(FormInterface $form): bool
   {
       return false;
   }
}