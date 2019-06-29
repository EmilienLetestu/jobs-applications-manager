<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 13:13
 */

namespace App\Tests\Entity;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class ContactTest
 * @package App\Tests\Entity
 */
class ContactTest extends TestCase
{
    public function testContact()
    {
        $contact = new Contact();


        $contact->setName('toto titi');
        $contact->setEmail('test@test.gmail');
        $contact->setSource('linkedIn');
        $contact->setMobilePhone('0606060606');
        $contact->setLandLine(null);

        $this->assertEquals('toto titi', $contact->getName());
        $this->assertEquals('test@test.gmail', $contact->getEmail());
        $this->assertEquals('0606060606', $contact->getMobilePhone());
        $this->assertNull($contact->getLandLine());


    }
}