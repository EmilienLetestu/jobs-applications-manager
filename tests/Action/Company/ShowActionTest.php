<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 23:06
 */

namespace App\Tests\Action\Company;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ShowActionTest
 * @package App\Tests\Action\Company
 */
class ShowActionTest extends WebTestCase
{
    public function testShowAction()
    {
        $client = static::createClient();
        $client->request('GET', '/company/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html h1', 'Entreprises');
        $this->assertSelectorTextContains('html h2', 'TEST COMPANY');
    }
}