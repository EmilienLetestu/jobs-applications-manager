<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 11:11
 */

namespace App\Repository;


use App\Entity\Job;
use App\Repository\Interfaces\JobRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class JobRepository
 * @package App\Repository
 */
class JobRepository extends ServiceEntityRepository implements JobRepositoryInterface
{
    /**
     * JobRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Job::class);
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param int $id
     */
    private function whereId(QueryBuilder $queryBuilder, int $id)
    {
        $queryBuilder
            ->andWhere('j.id = :id')
            ->setParameter('id', $id)
        ;
    }

    /**
     * @param Job|null $job
     * @param string $message
     * @return Job|null
     */
    public function handleNotFoundException(?Job $job, string $message): ?Job
    {
        if (is_null($job))
        {
            throw new NotFoundHttpException($message);
        }

        return $job;
    }

    /**
     * @return array
     */
    public function findAllJobs(): array
    {
        return
            $this->createQueryBuilder('j')
                ->select('j')
                ->getQuery()
                ->getResult()
            ;
    }

    /**
     * @param int $id
     * @return Job|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findJobWithId(int $id): ?Job
    {
        $queryBuilder = $this->createQueryBuilder('j');
        $this->whereId($queryBuilder, $id);

        $company = $queryBuilder
            ->getQuery()
            ->getOneOrNullResult()
        ;

        return
            $this->handleNotFoundException(
                $company,
                'Aucune offre correspondante'
            )
        ;
    }
}