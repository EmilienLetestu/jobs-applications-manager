<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 30/06/2019
 * Time: 20:35
 */

namespace App\DataFixtures;

use App\Entity\Application;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ApplicationFixtures
 * @package App\DataFixtures
 */
class ApplicationFixtures extends Fixture implements DependentFixtureInterface
{
    public const APPLICATION = 'application';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $company = $this->getReference(CompanyFixtures::COMPANY);
        $job     = $this->getReference(JobFixtures::BACK_END_DEV);
        $appointment = $this->getReference(AppointmentFixtures::APPOINTMENT);

        $application = new Application();
        $application->setAppliedOn(new \DateTime('now'));
        $application->setStatus('waiting for response');
        $application->setAppointment($appointment);
        $application->setJob($job);
        $application->setCompany($company);



        $manager->persist($application);
        $manager->flush();

        $this->addReference(self::APPLICATION, $application);
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            CompanyFixtures::class,
            JobFixtures::class,
            AppointmentFixtures::class
        ];
    }
}
