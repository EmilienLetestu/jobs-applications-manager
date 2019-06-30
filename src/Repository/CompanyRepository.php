<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 21:19
 */

namespace App\Repository;


use App\Entity\Company;
use App\Repository\Interfaces\CompanyRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CompanyRepository
 * @package App\Repository
 */
class CompanyRepository extends ServiceEntityRepository implements CompanyRepositoryInterface
{
    /**
     * CompanyRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Company::class);
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param int $id
     */
    private function whereId(QueryBuilder $queryBuilder, int $id)
    {
        $queryBuilder
            ->andWhere('c.id = :id')
            ->setParameter('id', $id)
        ;
    }

    /**
     * @param Company|null $company
     * @param string $message
     * @return Company|null
     */
    public function handleNotFoundException(?Company $company, string $message):? Company
    {
        if (is_null($company))
        {
            throw new NotFoundHttpException($message);
        }

        return $company;
    }


    /**
     * @return array
     */
    public function findAllCompanies(): array
    {
        return
            $this->createQueryBuilder('c')
            ->select('c')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param int $id
     * @return Company|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findCompanyWithId(int $id):? Company
    {
        $queryBuilder = $this->createQueryBuilder('c');
        $this->whereId($queryBuilder, $id);

        $company = $queryBuilder
            ->getQuery()
            ->getOneOrNullResult()
        ;

        return
            $this->handleNotFoundException(
                $company,
                'Aucune entreprise correspondante'
            )
        ;
    }
}