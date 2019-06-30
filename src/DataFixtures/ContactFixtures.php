<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 20:28
 */

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ContactFixtures
 * @package App\DataFixtures
 */
class ContactFixtures extends Fixture implements DependentFixtureInterface
{
    public const CONTACT = 'contact';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
       $company = $this->getReference(CompanyFixtures::COMPANY);

       $contact = new Contact();

       $contact->setName('Toto Titi');
       $contact->setEmail('titi@gmail.com');
       $contact->setSource('linkedin');
       $contact->setLandLine(null);
       $contact->setMobilePhone(0606060606);
       $contact->setCompany($company);

       $manager->persist($contact);
       $manager->flush();

       $this->addReference(self::CONTACT, $contact);
    }

    public function getDependencies()
    {
       return [CompanyFixtures::class];
    }
}