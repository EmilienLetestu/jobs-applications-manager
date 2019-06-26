<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 26/06/2019
 * Time: 16:36
 */

namespace App\Tests\DataModel;


use App\Entity\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ApplicationDataModelTest extends KernelTestCase
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

    public function testApplicationDataModel()
    {
        $metadata = $this->entityManager
            ->getClassMetadata(Application::class)
        ;

        $mapping = $metadata->fieldMappings;

        $this->assertEquals(
            [
                'fieldName'  => 'id',
                'type'       => 'integer',
                'columnName' => 'id',
                'id'         => true,
            ],
            $mapping['id']
        );

        $this->assertEquals(
            [
                'fieldName'  => 'appliedOn',
                'type'       => 'datetime',
                'columnName' => 'applied_on'
            ],
            $mapping['appliedOn']
        );

        $this->assertEquals(
            [
                'fieldName'  => 'status',
                'type'       => 'string',
                'columnName' => 'status'
            ],
            $mapping['status']
        );

        $this->assertEquals(3, count($mapping));
    }
}