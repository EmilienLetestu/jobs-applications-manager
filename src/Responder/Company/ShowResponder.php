<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 23:12
 */

namespace App\Responder\Company;


use App\Entity\Company;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShowResponder
 * @package App\Responder\Company
 */
class ShowResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ShowResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param Company $company
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Company $company): Response
    {
        return new Response(
            $this->twig->render('company/show.html.twig',[
                'company' => $company
            ])
        );
    }
}