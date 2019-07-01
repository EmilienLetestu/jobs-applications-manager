<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 10:56
 */

namespace App\Tests\Repository;

use App\Entity\Appointment;
use App\Repository\AppointmentRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AppointmentRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    /**
     * @return AppointmentRepository
     */
    private function getRepository(): EntityRepository
    {
        return $this->entityManager
            ->getRepository(Appointment::class)
            ;
    }

    public function testFindAllAppointments()
    {
        $appointments = $this->getRepository()
            ->findAllAppointments()
        ;

        $this->assertGreaterThan(0, $appointments);
    }

    public function testFindAppointmentsWithId()
    {
        $appointment = $this->getRepository()
            ->findAppointmentWithId(1)
        ;

        $this->assertSame(48.8558487, $appointment->getLat());
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }

}