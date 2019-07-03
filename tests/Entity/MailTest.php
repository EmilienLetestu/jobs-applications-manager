<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 03/07/2019
 * Time: 09:38
 */

namespace App\Tests\Entity;


use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class MailTest extends TestCase
{
    public function testMail()
    {
        $mail = new Mail();

        $mailBody          = 'Lorem ipsum dolor sit amet, consectetur cras amet.';
        $senderMail        = 'applicant@gmail.com';
        $subject           = 'candidature';
        $applicantFullname = 'Toto Lolo';
        $date              = new \DateTime();
        $signature         = null;

        $mail->setBody($mailBody);
        $mail->setSender($senderMail);
        $mail->setSubject($subject);
        $mail->setApplicant($applicantFullname);
        $mail->setCreatedOn($date);
        $mail->setUpdatedOn(null);
        $mail->setSignature($signature);

        $this->assertSame($mailBody, $mail->getBody());
        $this->assertSame($senderMail, $mail->getSender());
        $this->assertSame($subject, $mail->getSubject());
        $this->assertSame($applicantFullname, $mail->getApplicant());
        $this->assertSame($date, $mail->getCreatedOn());
        $this->assertNull($mail->getUpdatedOn());
        $this->assertNull($mail->getSignature());
    }
}