<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 14:54
 */

namespace App\Tests\Action\Application;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ShowListingActionTest
 * @package App\Tests\Action\Application
 */
class ShowListingActionTest extends WebTestCase
{
    public function testShowListingAction()
    {
        $client = self::createClient();

        $client->request('GET', '/application');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html h1', 'Candidatures');
        $this->assertSelectorTextContains('html h2', 'Listing');

    }
}