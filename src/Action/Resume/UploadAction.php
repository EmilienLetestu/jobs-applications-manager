<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 17:43
 */

namespace App\Action\Resume;

use App\Form\type\UploadResumeType;
use App\Handler\UploadResumeHandler;
use App\Responder\Resume\UploadResponder as Responder;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UploadAction
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UploadResumeHandler
     */
    private $handler;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * UploadAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param UploadResumeHandler $handler
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        UploadResumeHandler  $handler,
        UrlGeneratorInterface $urlGenerator
    )
    {
        $this->formFactory  = $formFactory;
        $this->handler      = $handler;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route(
     *     "/upload-resume",
     *     name="upload_resume"
     * )
     * @param Responder $responder
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Responder $responder, Request $request)
    {
        $form = $this->formFactory
            ->create(UploadResumeType::class)
        ;

        if($this->handler->handle($form->handleRequest($request)))
        {
            return new RedirectResponse(
                $this->urlGenerator->generate('home')
            );
        }

        return $responder($form->createView());
    }
}