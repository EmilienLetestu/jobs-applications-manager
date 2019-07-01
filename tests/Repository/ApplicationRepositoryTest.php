<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 14:21
 */

namespace App\Tests\Repository;


use App\Entity\Application;
use App\Repository\ApplicationRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class ApplicationRepositoryTest
 * @package App\Tests\Repository
 */
class ApplicationRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;
    }

    /**
     * @return ApplicationRepository
     */
    private function getRepository(): ApplicationRepository
    {
        return $this->entityManager
            ->getRepository(Application::class)
        ;
    }

    public function testFindAllApplications()
    {
        $applications = $this->getRepository()
            ->findAllApplications()
        ;

        $this->assertGreaterThan(0, $applications);
    }

    public function testFindApplicationWithId()
    {
        $application = $this->getRepository()
            ->findApplicationWithId(1)
        ;

        $this->assertSame('waiting for response', $application->getStatus());
    }
}