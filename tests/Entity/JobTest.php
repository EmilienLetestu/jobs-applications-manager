<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 13:13
 */

namespace App\Tests\Entity;

use App\Entity\Job;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class JobTest
 * @package App\Tests\Entity
 */
class JobTest extends TestCase
{
    public function testJob()
    {
        $job = new Job();

        $description = 'dqdqsdqsd dqdsqdsd qdqsd';
        $position    = 'back-end developer';

        $job->setDescription($description);
        $job->setPosition($position);

        $this->assertEquals($description, $job->getDescription());
        $this->assertEquals($position, $job->getPosition());
        $this->assertTrue($job->getApplications() instanceof ArrayCollection);

    }
}
