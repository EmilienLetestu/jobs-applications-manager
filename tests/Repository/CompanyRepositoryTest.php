<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 10:18
 */

namespace App\Tests\Repository;


use App\Entity\Company;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class CompanyRepositoryTest
 * @package App\Tests\Repository
 */
class CompanyRepositoryTest extends KernelTestCase
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
            ->getRepository(Company::class)
        ;
    }

    public function testFindAllCompanies()
    {
        $companies = $this->getRepository()
            ->findAllCompanies()
        ;

        $this->assertGreaterThan(0, $companies);
    }

    public function testFindCompanyWithId()
    {
        $company = $this->getRepository()
            ->findCompanyWithId(1)
        ;

        $this->assertSame('test company', $company->getName());
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