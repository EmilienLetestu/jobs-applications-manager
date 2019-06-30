<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 23:46
 */

namespace App\Repository;

use App\Entity\Appointment;
use App\Repository\Interfaces\AppointmentRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class AppointmentRepository
 * @package App\Repository
 */
class AppointmentRepository extends ServiceEntityRepository implements AppointmentRepositoryInterface
{
    /**
     * AppointmentRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Appointment::class);
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param int $id
     */
    private function whereId(QueryBuilder $queryBuilder, int $id)
    {
        $queryBuilder
            ->andWhere('a.id = :id')
            ->setParameter('id', $id)
        ;
    }

    /**
     * @param Appointment|null $appointment
     * @param string $message
     * @return Appointment|null
     */
    public function handleNotFoundException(?Appointment $appointment, string $message): ?Appointment
    {
        if (is_null($appointment))
        {
            throw new NotFoundHttpException($message);
        }

        return $appointment;
    }

    /**
     * @return array
     */
    public function findAllAppointments(): array
    {
        $this->createQueryBuilder('a')
            ->select('a')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param int $id
     * @return Appointment|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findAppointmentWithId(int $id): ?Appointment
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $this->whereId($queryBuilder, $id);

        $company = $queryBuilder
            ->getQuery()
            ->getOneOrNullResult()
        ;

        return
            $this->handleNotFoundException(
                $company,
                'Aucun rendez-vous correspondant'
            )
        ;
    }
}