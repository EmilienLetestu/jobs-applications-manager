<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 11:41
 */

namespace App\Responder\Job;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class ShowListingResponder
 * @package App\Responder
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
     * @param array $jobs
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function __invoke(array $jobs): Response
    {
        return new Response(
            $this->twig->render('job/show_listing.html.twig',[
                'jobs' => $jobs
            ])
        );
    }
}
