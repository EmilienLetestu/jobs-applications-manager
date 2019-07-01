<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 17:43
 */

namespace App\Action\Resume;

use App\Responder\Resume\UploadResponder as Responder;
use Symfony\Component\Routing\Annotation\Route;

class UploadAction
{
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
    public function __invoke(Responder $responder)
    {
        return $responder();
    }
}