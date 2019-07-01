<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 11:41
 */

namespace App\Action\Job;


use App\Repository\Interfaces\JobRepositoryInterface;
use App\Responder\Job\ShowListingResponder as Responder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowListingAction
{
    /**
     * @var JobRepositoryInterface
     */
    private $repository;

    /**
     * ShowListingAction constructor.
     * @param JobRepositoryInterface $repository
     */
    public function __construct(JobRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route(
     *     "/job",
     *     name="job_listing",
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
            $this->repository->findAllJobs()
        );
    }
}