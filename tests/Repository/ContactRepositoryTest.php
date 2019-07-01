<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 15:50
 */

namespace App\Tests\Repository;


use App\Entity\Contact;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContactRepositoryTest extends KernelTestCase
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
            ->getRepository(Contact::class)
            ;
    }

    public function testFindAllContacts()
    {
        $contacts = $this->getRepository()
            ->findAllContacts()
        ;

        $this->assertGreaterThan(0, $contacts);
    }

    public function testFindContactWithId()
    {
        $contact = $this->getRepository()
            ->findContactWithId(1)
        ;

        $this->assertSame('Toto Titi', $contact->getName());
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