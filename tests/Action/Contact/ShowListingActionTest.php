<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 16:23
 */

namespace App\Tests\Action\Contact;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShowListingActionTest extends WebTestCase
{
    public function testShowListingAction()
    {
        $client = static::createClient();
        $client->request('GET', '/contact');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html h1', 'Contacts');
        $this->assertSelectorTextContains('html h2', 'Listing');
    }
}