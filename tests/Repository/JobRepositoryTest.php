<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 11:05
 */

namespace App\Tests\Repository;


use App\Entity\Job;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class JobRepositoryTest extends KernelTestCase
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
     * @return EntityRepository
     */
    private function getRepository(): EntityRepository
    {
        return $this->entityManager
            ->getRepository(Job::class)
        ;
    }

    public function testFindAllJobs()
    {
        $jobs = $this->getRepository()
            ->findAllJobs()
        ;

        $this->assertGreaterThan(0, $jobs);
    }

    public function testFindJobWithId()
    {
        $job = $this->getRepository()
            ->findJobWithId(1)
        ;

        $this->assertSame('backend developer', $job->getPosition());
    }
}