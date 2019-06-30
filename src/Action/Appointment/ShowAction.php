<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 00:10
 */

namespace App\Action\Appointment;


use App\Repository\Interfaces\AppointmentRepositoryInterface;
use App\Responder\Appointment\ShowResponder as Responder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowAction
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
     *     "/appointment/{id}",
     *     name="show_appointment",
     *     requirements={"id" = "\d+"},
     *     methods={"GET"}
     * )
     * @param Responder $responder
     * @param Request $request
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Responder $responder, Request $request): Response
    {
        return $responder(
            $this->repository->findAppointmentWithId($request->get('id'))
        );
    }
}