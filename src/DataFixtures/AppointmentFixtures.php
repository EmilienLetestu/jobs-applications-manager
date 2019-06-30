<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 20:34
 */

namespace App\DataFixtures;

use App\Entity\Appointment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class AppointmentFixtures
 * @package App\DataFixtures
 */
class AppointmentFixtures extends Fixture
{
    public const APPOINTMENT = 'appointment';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $date = new \DateTime('now');

        $appointment = new Appointment();
        $appointment->setDateStart($date);
        $appointment->setDateEnd($date->modify('+1 hour'));
        $appointment->setPostpone(false);
        $appointment->setLocation('Paris, 15 rue de Rivoli');
        $appointment->setLat(48.8558487);
        $appointment->setLng(2.3576561);

        $manager->persist($appointment);
        $manager->flush();

        $this->addReference(self::APPOINTMENT, $appointment);
    }
}
