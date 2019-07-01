<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 16:31
 */

namespace App\Action\Contact;

use App\Repository\Interfaces\ContactRepositoryInterface;
use App\Responder\Contact\ShowListingResponder as Responder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ShowListingAction
 * @package App\Action\Contact
 */
class ShowListingAction
{
    /**
     * @var ContactRepositoryInterface
     */
    private $repository;

    /**
     * ShowListingAction constructor.
     * @param ContactRepositoryInterface $repository
     */
    public function __construct(ContactRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route(
     *     "/contact",
     *     name="contact_listing",
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
           $this->repository->findAllContacts()
       );
    }

}