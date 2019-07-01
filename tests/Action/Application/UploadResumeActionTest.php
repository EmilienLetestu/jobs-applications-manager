<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 17:34
 */

namespace App\Tests\Action\Application;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class UploadResumeActionTest
 * @package App\Tests\Action\Application
 */
class UploadResumeActionTest extends WebTestCase
{
    public function testUploadResumeAction()
    {
        $client = static::createClient();

        $client->request('GET', '/upload-resume');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('html h1', 'Upload du CV');
    }
}