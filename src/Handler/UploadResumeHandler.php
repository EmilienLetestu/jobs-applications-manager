<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 03/07/2019
 * Time: 08:16
 */

namespace App\Handler;


use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UploadResumeHandler
{
    private const UPLOAD_PATH = '../public/resume';

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * UploadResumeHandler constructor.
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->filesystem = new Filesystem();
        $this->session    = $session;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if($form->isSubmitted() && $form->isValid())
        {
            if(!$this->filesystem->exists(self::UPLOAD_PATH)){
                $this->filesystem->mkdir(self::UPLOAD_PATH);
            }

            $pdf = $form->get('resume')->getData();
            $pdf->move(self::UPLOAD_PATH, 'resume.pdf');
            
            return true;
        }
        
        return false;
    }
}