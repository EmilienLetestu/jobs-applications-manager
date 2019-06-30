<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 22:17
 */

namespace App\Tests\Action\Company;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ShowListingActionTest
 * @package App\Tests\Action\Company
 */
class ShowListingActionTest extends WebTestCase
{
    public function testShowListing()
    {
        $client = static::createClient();
        $client->request('GET', '/company');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSelectorTextContains('html h1', 'Entreprises');
        $this->assertSelectorTextContains('html h2', 'Listing');
    }
}