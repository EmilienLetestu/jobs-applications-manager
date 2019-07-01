<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 14:32
 */

namespace App\Repository;

use App\Entity\Application;
use App\Repository\Interfaces\ApplicationRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ApplicationRepository
 * @package App\Repository
 */
class ApplicationRepository extends ServiceEntityRepository implements ApplicationRepositoryInterface
{
    /**
     * ApplicationRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Application::class);
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param int $id
     */
    private function whereId(QueryBuilder $queryBuilder, int $id)
    {
        $queryBuilder
            ->andWhere('ap.id = :id')
            ->setParameter('id', $id)
        ;
    }

    /**
     * @param Application|null $application
     * @param string $message
     * @return Application|null
     */
    public function handleNotFoundException(?Application $application, string $message): ?Application
    {
        if (is_null($application))
        {
            throw new NotFoundHttpException($message);
        }

        return $application;
    }

    /**
     * @return array
     */
    public function findAllApplications(): array
    {
        return
            $this->createQueryBuilder('ap')
            ->select('ap')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param int $id
     * @return Application|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findApplicationWithId(int $id): ?Application
    {
        $queryBuilder = $this->createQueryBuilder('ap');
        $this->whereId($queryBuilder, $id);

        $application = $queryBuilder
            ->getQuery()
            ->getOneOrNullResult()
        ;

        return
            $this->handleNotFoundException(
                $application,
                'Aucune candidature correspondante'
            )
        ;
    }
}