<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 14:05
 */

namespace App\Action\Job;


use App\Repository\Interfaces\JobRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Responder\Job\ShowResponder as Responder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowAction
{
    /**
     * @var JobRepositoryInterface
     */
    private $repository;

    /**
     * ShowAction constructor.
     * @param JobRepositoryInterface $repository
     */
    public function __construct(JobRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route(
     *     "/job/{id}",
     *     name="show_job",
     *     requirements={"id" = "\d+"},
     *     methods={"GET"}
     * )
     * @param Request $request
     * @param Responder $responder
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Request $request, Responder $responder): Response
    {
        return $responder(
            $this->repository->findJobWithId($request->get('id'))
        );
    }
}