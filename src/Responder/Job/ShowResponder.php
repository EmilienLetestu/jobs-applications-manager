<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 14:06
 */

namespace App\Responder\Job;

use App\Entity\Job;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShowResponder
 * @package App\Responder\Job
 */
class ShowResponder
{
    /**
     * @var
     */
    private $twig;

    /**
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param Job $job
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(Job $job): Response
    {
        return new Response(
            $this->twig->render('job/show.html.twig',[
                'job' => $job
            ])
        );
    }
}
