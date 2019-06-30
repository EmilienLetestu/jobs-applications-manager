<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 21:12
 */

namespace App\Action\Company;

use App\Repository\Interfaces\CompanyRepositoryInterface;
use App\Responder\Company\ShowListingResponder as Responder;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ShowListingAction
 * @package App\Action\Company
 */
class ShowListingAction
{
    /**
     * @var
     */
    private $repository;

    /**
     * ShowListingAction constructor.
     * @param CompanyRepositoryInterface $repository
     */
    public function __construct(CompanyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route(
     *     "/company",
     *     name="company_listing",
     *     methods={"GET"}
     * )
     * @param Responder $responder
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Responder $responder)
    {
       return$responder($this->repository->findAllCompanies());
    }
}