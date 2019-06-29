<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2019
 * Time: 16:46
 */

namespace App\Tests\DataModel;

use App\Entity\Appointment;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class AppointmentDataModelTest
 * @package App\Tests\DataModel
 */
class AppointmentDataModelTest extends KernelTestCase
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
            ->getManager();
    }


    public function testAppointmentDataModel()
    {
        $metadata = $this->entityManager
            ->getClassMetadata(Appointment::class)
        ;

        $mapping = $metadata->fieldMappings;

        $this->assertEquals(
            [
                'fieldName' => 'id',
                'type' => 'integer',
                'columnName' => 'id',
                'id' => true,
            ],
            $mapping['id']
        );

        $this->assertEquals(
            [
                'fieldName'  => 'dateStart',
                'type'       => 'datetime',
                'columnName' => 'date_start'
            ],
            $mapping['dateStart']
        );

        $this->assertEquals(
            [
                'fieldName'   => 'dateEnd',
                'type'        => 'datetime',
                'columnName'  => 'date_end'
            ],
            $mapping['dateEnd']
        );

        $this->assertEquals(
            [
                'fieldName'  => 'lat',
                'type'       => 'float',
                'columnName' => 'lat'
            ],
            $mapping['lat']
        );

        $this->assertEquals(
            [
                'fieldName'   => 'lng',
                'type'        => 'float',
                'columnName'  => 'lng'
            ],
            $mapping['lng']
        );

        $this->assertEquals(
            [
                'fieldName'  => 'postpone',
                'type'       => 'boolean',
                'columnName' => 'postpone'
            ],
            $mapping['postpone']
        );

        $this->assertEquals(
            [
                'fieldName'  => 'location',
                'type'       => 'string',
                'columnName' => 'location'
            ],
            $mapping['location']
        );

        $this->assertEquals(7, count($mapping));
    }
}