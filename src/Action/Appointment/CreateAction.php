<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 21:03
 */

namespace App\Action\Appointment;

use App\Form\type\AppointmentType;
use App\Responder\Appointment\CreateResponder as Responder;
use App\Handler\Interfaces\CreateAppointmentHandlerInterface as FormHandlerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CreateAction
 * @package App\Action
 */
class CreateAction
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
     * CreateAction constructor.
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

    /**
     * @Route(
     *     "/appointment/create",
     *     name="createAppointment",
     *     methods={"POST", "GET"}
     * )
     * @param Request $request
     * @param Responder $responder
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Request $request, Responder $responder): Response
    {
        $form = $this->formFactory
            ->create(AppointmentType::class)
        ;

        return $responder($form->createView());
    }
}