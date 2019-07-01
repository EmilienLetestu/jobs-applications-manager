<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 16:47
 */

namespace App\Action\Contact;

use App\Repository\Interfaces\ContactRepositoryInterface;
use App\Responder\Contact\ShowResponder as Responder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ShowAction
 * @package App\Action\Contact
 */
class ShowAction
{
    /**
     * @var ContactRepositoryInterface
     */
    private $repository;

    /**
     * ShowAction constructor.
     * @param ContactRepositoryInterface $repository
     */
    public function __construct(ContactRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route(
     *     "/contact/{id}",
     *     name="show_contact",
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
            $this->repository->findContactWithId($request->get('id'))
        );
    }
}
