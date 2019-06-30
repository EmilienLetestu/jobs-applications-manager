<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 23:32
 */

namespace App\Tests\Action\Appointment;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ShowListingActionTest
 * @package App\Tests\Action\Appointment
 */
class ShowListingActionTest extends WebTestCase
{
    public function testShowListing()
    {
        $client = static::createClient();
        $client->request('GET', '/appointment');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html h1', 'Rendez-vous');
        $this->assertSelectorTextContains('html h2', 'Listing');
    }
}