<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 21:04
 */

namespace App\Responder\Appointment;


use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class CreateResponder
 * @package App\Responder
 */
class CreateResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * CreateResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param FormView $form
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(FormView $form): Response
    {
        return new Response(
            $this->twig->render('appointment/create.html.twig',[
                'form' => $form
            ])
        );
    }
}
