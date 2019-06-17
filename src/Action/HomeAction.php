<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2019
 * Time: 16:22
 */

namespace App\Action;

use App\Responder\HomeResponder as Responder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeAction
{
    /**
     * @Route("/", name="home")
     * @param Responder $responder
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Responder $responder): Response
    {
        return $responder('Hello world');
    }
}