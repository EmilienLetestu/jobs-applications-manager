<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 23:12
 */

namespace App\Action\Company;

use App\Repository\Interfaces\CompanyRepositoryInterface;
use App\Responder\Company\ShowResponder as Responder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ShowAction
 * @package App\Action\Company
 */
class ShowAction
{
    /**
     * @var CompanyRepositoryInterface
     */
    private $repository;

    /**
     * ShowAction constructor.
     * @param CompanyRepositoryInterface $repository
     */
    public function __construct(CompanyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route(
     *     "/company/{id}",
     *     name="show_company",
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
            $this->repository->findCompanyWithId($request->get('id'))
        );
    }
}
