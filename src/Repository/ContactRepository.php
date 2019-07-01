<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 15:56
 */

namespace App\Repository;


use App\Entity\Contact;
use App\Repository\Interfaces\ContactRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContactRepository extends ServiceEntityRepository implements ContactRepositoryInterface
{
    /**
     * CompanyRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param int $id
     */
    private function whereId(QueryBuilder $queryBuilder, int $id)
    {
        $queryBuilder
            ->andWhere('co.id = :id')
            ->setParameter('id', $id)
        ;
    }

    /**
     * @param Contact|null $contact
     * @param string $message
     * @return Contact|null
     */
    public function handleNotFoundException(?Contact $contact, string $message):? Contact
    {
        if (is_null($contact))
        {
            throw new NotFoundHttpException($message);
        }

        return $contact;
    }


    /**
     * @return array
     */
    public function findAllContacts(): array
    {
        return
            $this->createQueryBuilder('co')
                ->select('co')
                ->getQuery()
                ->getResult()
            ;
    }

    /**
     * @param int $id
     * @return Contact|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findContactWithId(int $id):? Contact
    {
        $queryBuilder = $this->createQueryBuilder('co');
        $this->whereId($queryBuilder, $id);

        $contact = $queryBuilder
            ->getQuery()
            ->getOneOrNullResult()
        ;

        return
            $this->handleNotFoundException(
                $contact,
                'Aucune contact correspondant'
            )
       ;
    }
}