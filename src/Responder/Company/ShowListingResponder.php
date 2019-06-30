<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 21:13
 */

namespace App\Responder\Company;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShowCompaniesResponder
 * @package App\Responder
 */
class ShowListingResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ShowCompaniesResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param array $companies
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(array $companies): Response
    {
        return new Response(
            $this->twig->render('company/show_listing.html.twig',[
                'companies' => $companies
            ])
        );
    }
}