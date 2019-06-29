<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 29/06/2019
 * Time: 13:13
 */

namespace App\Tests\Entity;

use App\Entity\Company;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class CompanyTest
 * @package App\Tests\Entity
 */
class CompanyTest extends TestCase
{
    public function testCompany()
    {
        $company = new Company();

        $company->setName('test');
        $company->setType('ssi');

        $this->assertEquals('test', $company->getName());
        $this->assertEquals('ssi', $company->getType());
        $this->assertTrue($company->getContacts() instanceof ArrayCollection);

    }
}