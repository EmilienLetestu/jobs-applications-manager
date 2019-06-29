<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2019
 * Time: 16:55
 */

namespace App\Tests\DataModel;

use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class CompanyDataModelTest
 * @package App\Tests\DataModel
 */
class CompanyDataModelTest extends KernelTestCase
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
            ->getClassMetadata(Company::class)
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
                'length'     => 70
            ],
            $mapping['name']
        );

        $this->assertEquals(
            [
                'fieldName'  => 'type',
                'type'       => 'string',
                'columnName' => 'type',
                'length'     => 25
            ],
            $mapping['type']
        );

        $this->assertEquals(3, count($mapping));
    }
}
