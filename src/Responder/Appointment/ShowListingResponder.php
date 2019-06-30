<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 23:41
 */

namespace App\Responder\Appointment;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShowListingResponder
 * @package App\Responder\Appointment
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
     * @param array $appointments
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(array $appointments): Response
    {
        return new Response(
            $this->twig->render('appointment/show_listing.html.twig',[
                'appointments' => $appointments
            ])
        );
    }
}