<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 12:52
 */

namespace App\Tests\Entity;


use App\Entity\Appointment;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class AppointmentTest
 * @package App\Tests\Entity
 */
class AppointmentTest extends TestCase
{
    public function testAppointment()
    {

        $dateStart   = new \DateTime();
        $dateEnd     = new \DateTime();
        $location    = 'Paris, 15 rue de Rivoli';
        $lat         = 48.8558487;
        $lng         = 2.3576561;

        $appointment = new Appointment();

        $appointment->setDateStart($dateStart);
        $appointment->setDateEnd($dateEnd);
        $appointment->setPostpone(false);
        $appointment->setLocation($location);
        $appointment->setLat($lat);
        $appointment->setLng($lng);

        $this->assertEquals($dateStart, $appointment->getDateStart());
        $this->assertEquals($dateEnd, $appointment->getDateEnd());
        $this->assertFalse($appointment->getPostpone());
        $this->assertEquals($lat, $appointment->getLat());
        $this->assertEquals($lng, $appointment->getLng());


    }
}