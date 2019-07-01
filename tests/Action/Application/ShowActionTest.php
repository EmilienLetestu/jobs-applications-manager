<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 15:26
 */

namespace App\Tests\Action\Application;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShowActionTest extends WebTestCase
{
    public function testShowAction()
    {
        $client = self::createClient();

        $client->request('GET', '/application/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html h1', 'Candidatures');
        $this->assertSelectorTextContains('html h2', 'Test company');
    }
}