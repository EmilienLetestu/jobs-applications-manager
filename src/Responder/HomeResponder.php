<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2019
 * Time: 16:19
 */

namespace App\Responder;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * HomeResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
      $this->twig = $twig;
    }

    /**
     * @param string $testTitle
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(string $testTitle): Response
    {
      return new Response(
          $this->twig->render('home.html.twig',[
              'testTitle' => $testTitle
          ])
      );
    }
}