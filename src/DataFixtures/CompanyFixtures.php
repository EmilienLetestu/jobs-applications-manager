<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 20:34
 */

namespace App\DataFixtures;


use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class CompanyFixtures
 * @package App\DataFixtures
 */
class CompanyFixtures extends Fixture
{
    public const COMPANY = 'company';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $company = new Company();

        $company->setName('test company');
        $company->setType('esn');

        $manager->persist($company);
        $manager->flush();

        $this->addReference(self::COMPANY, $company);
    }
}
