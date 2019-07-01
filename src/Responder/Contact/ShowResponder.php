<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 16:49
 */

namespace App\Responder\Contact;

use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShowResponder
 * @package App\Responder\Contact
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
     * @param Contact $contact
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Contact $contact): Response
    {
       return new Response(
           $this->twig->render('contact/show.html.twig',[
               'contact' => $contact
           ])
       );
    }
}