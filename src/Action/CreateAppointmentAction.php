<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 21:03
 */

namespace App\Action;

use App\Responder\CreateAppointmentResponder as Responder;
use App\Handler\Interfaces\CreateAppointmentHandlerInterface as FormHandlerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class CreateAppointmentAction
 * @package App\Action
 */
class CreateAppointmentAction
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var FormHandlerInterface
     */
    private $handler;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * CreateAppointmentAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param FormHandlerInterface $handler
     * @param UrlGeneratorInterface $urlGenerator
     * @param SessionInterface $session
     */
    public function __construct(
        FormFactoryInterface  $formFactory,
        FormHandlerInterface  $handler,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface      $session

    )
    {
        $this->formFactory  = $formFactory;
        $this->handler      = $handler;
        $this->urlGenerator = $urlGenerator;
        $this->session      = $session;
    }

    public function __invoke(Request $request, Responder $responder): Response
    {
        return $responder();
    }
}