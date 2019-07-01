<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 01/07/2019
 * Time: 16:41
 */

namespace App\Tests\Action\Contact;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ShowActionTest
 * @package App\Tests\Action\Contact
 */
class ShowActionTest extends WebTestCase
{
   public function testShowAction()
   {
       $client = static::createClient();
       $client->request('GET', 'contact/1');

       $this->assertEquals(200, $client->getResponse()->getStatusCode());

       $this->assertSelectorTextContains('html h1', 'Contacts');
       $this->assertSelectorTextContains('html h2', 'Toto Titi');
   }
}