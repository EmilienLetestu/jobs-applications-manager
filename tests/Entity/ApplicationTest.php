<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 12:44
 */

namespace App\Tests\Entity;


use App\Entity\Application;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class ApplicationTest
 * @package App\Tests\Entity
 */
class ApplicationTest extends TestCase
{
    public function testApplication()
    {
        $date = new \DateTime('now');
        $application = new Application();

        $application->setAppliedOn($date);
        $application->setStatus('sent');

        $this->assertEquals($date, $application->getAppliedOn());
        $this->assertEquals('sent', $application->getStatus());
    }
}
