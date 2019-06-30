<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 23:32
 */

namespace App\Tests\Action\Appointment;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShowActionTest extends WebTestCase
{
    public function testShowAction()
    {
        $client = static::createClient();
        $client->request('GET', '/appointment/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html h1', 'Rendez-vous');
        $this->assertSelectorTextContains('html h2', 'Test company - Backend developer');
    }
}