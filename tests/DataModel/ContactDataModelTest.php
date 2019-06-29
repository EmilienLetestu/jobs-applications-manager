<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2019
 * Time: 17:00
 */

namespace App\Tests\DataModel;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class ContactDataModelTest
 * @package App\Tests\DataModel
 */
class ContactDataModelTest extends KernelTestCase
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
            ->getClassMetadata(Contact::class)
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
                'fieldName'  => 'name',
                'type'       => 'string',
                'columnName' => 'name',
                'length'     => 80
            ],
            $mapping['name']
        );

        $this->assertEquals(
            [
                'fieldName'  => 'email',
                'type'       => 'string',
                'columnName' => 'email',
                'length'     => 100
            ],
            $mapping['email']
        );

        $this->assertEquals(
            [
                'fieldName'  => 'source',
                'type'       => 'string',
                'columnName' => 'source',
                'nullable'   => true
            ],
            $mapping['source']
        );

        $this->assertEquals(
            [
                'fieldName'  => 'mobilePhone',
                'type'       => 'string',
                'columnName' => 'mobile_phone',
                'nullable'   => true
            ],
            $mapping['mobilePhone']
        );

        $this->assertEquals(
            [
                'fieldName'  => 'landLine',
                'type'       => 'string',
                'columnName' => 'land_line',
                'nullable'   => true
            ],
            $mapping['landLine']
        );

        $this->assertEquals(6, count($mapping));
    }
}
