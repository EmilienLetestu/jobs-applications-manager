<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 14:59
 */

namespace App\Responder\Application;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ShowListingResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ShowListingResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param array $applications
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(array $applications): Response
    {
        return new Response(
            $this->twig->render('application/show_listing.html.twig',[
                'applications' => $applications
            ])
        );
    }
}