<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 15:29
 */

namespace App\Action\Application;

use App\Repository\Interfaces\ApplicationRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Responder\Application\ShowResponder as Responder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ShowAction
 * @package App\Action\Application
 */
class ShowAction
{
    /**
     * @var ApplicationRepositoryInterface
     */
    private $repository;

    /**
     * ShowAction constructor.
     * @param ApplicationRepositoryInterface $repository
     */
    public function __construct(ApplicationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route(
     *     "/application/{id}",
     *     name="show_application",
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
            $this->repository->findApplicationWithId($request->get('id'))
        );
    }
}