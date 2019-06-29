<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 21:12
 */

namespace App\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;

/**
 * Interface FormHandlerInterface
 * @package App\Handler\Interfaces
 */
Interface CreateAppointmentHandlerInterface
{
    public function handle(FormInterface $form): bool;
}