<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 23:40
 */

namespace App\Action\Appointment;

use App\Repository\Interfaces\AppointmentRepositoryInterface;
use App\Responder\Appointment\ShowListingResponder as Responder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowListingAction
{
    /**
     * @var AppointmentRepositoryInterface
     */
    private $repository;

    /**
     * ShowListingAction constructor.
     * @param AppointmentRepositoryInterface $repository
     */
    public function __construct(AppointmentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route(
     *     "/appointment",
     *     name="appointment_listing",
     *     methods={"GET"}
     * )
     * @param Responder $responder
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Responder $responder): Response
    {
        return $responder(
            $this->repository->findAllAppointments()
        );
    }
}