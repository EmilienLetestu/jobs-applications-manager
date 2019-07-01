<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 15:29
 */

namespace App\Responder\Application;


use App\Entity\Application;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShowResponder
 * @package App\Responder\Application
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
     * @param Application $application
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Application $application): Response
    {
        return new Response(
            $this->twig->render('application/show.html.twig', [
                'application' => $application
            ])
        );
    }
}