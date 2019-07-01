<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 17:46
 */

namespace App\Responder\Resume;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class UploadResponder
 * @package App\Responder\Resume
 */
class UploadResponder
{
    /**
     * @var
     */
    private $twig;

    /**
     * UploadResponder constructor.
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
           $this->twig->render('resume/upload.html.twig',[
               'form' => $form
           ])
       );
    }
}