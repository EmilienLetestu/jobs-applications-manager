<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 23:44
 */

namespace App\Repository\Interfaces;


use App\Entity\Appointment;

/**
 * Interface AppointmentRepositoryInterface
 * @package App\Repository\Interfaces
 */
Interface AppointmentRepositoryInterface
{
    /**
     * @param Appointment|null $appointment
     * @param string $message
     * @return Appointment|null
     */
    public function handleNotFoundException(?Appointment $appointment, string $message):? Appointment;

    /**
     * @return array
     */
    public function findAllAppointments(): array;

    /**
     * @param int $id
     * @return Appointment|null
     */
    public function findAppointmentWithId(int $id):? Appointment;
}