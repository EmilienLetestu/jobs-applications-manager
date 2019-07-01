<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 13:55
 */

namespace App\Tests\Action\Job;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ShowActionTest
 * @package App\Tests\Action\Job
 */
class ShowActionTest extends WebTestCase
{
    public function testShowAction()
    {
        $client = static::createClient();
        $client->request('GET', '/job/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html h1', 'Emplois');
        $this->assertSelectorTextContains('html h2', 'Test company - Backend developer');
    }
}