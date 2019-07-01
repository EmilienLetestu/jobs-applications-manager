<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 16:29
 */

namespace App\Responder\Contact;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShowListingResponder
 * @package App\Responder\Contact
 */
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
     * @param array $contacts
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(array $contacts): Response
    {
        return new Response(
            $this->twig->render('contact/show_listing.html.twig',[
                'contacts' => $contacts
            ])
        );
    }
}