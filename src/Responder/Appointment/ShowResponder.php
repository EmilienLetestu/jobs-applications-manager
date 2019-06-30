<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 00:11
 */

namespace App\Responder\Appointment;


use App\Entity\Appointment;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShowResponder
 * @package App\Responder\Appointment
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
     * @param Appointment $appointment
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Appointment $appointment): Response
    {
        return new Response(
            $this->twig->render('appointment/show.html.twig',[
                'appointment' => $appointment
            ])
        );
    }
}
