<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 14:58
 */

namespace App\Action\Application;


use App\Repository\Interfaces\ApplicationRepositoryInterface;
use App\Responder\Application\ShowListingResponder as Responder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowListingAction
{
    /**
     * @var ApplicationRepositoryInterface
     */
    private $repository;

    /**
     * ShowListingAction constructor.
     * @param ApplicationRepositoryInterface $repository
     */
    public function __construct(ApplicationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route(
     *     "/application",
     *     name="application_listing",
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
            $this->repository->findAllApplications()
        );
    }
}