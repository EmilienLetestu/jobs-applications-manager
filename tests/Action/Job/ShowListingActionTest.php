<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 11:38
 */

namespace App\Tests\Action\Job;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShowListingActionTest extends WebTestCase
{
    public function testShowListing()
    {
        $client = static::createClient();
        $client->request('GET', '/job');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html h1', 'Emplois');
        $this->assertSelectorTextContains('html h2', 'Listing');
    }
}