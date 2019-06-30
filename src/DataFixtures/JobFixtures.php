<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class JobFixtures
 * @package App\DataFixtures
 */
class JobFixtures extends Fixture
{
    public const BACK_END_DEV = 'back_end_dev';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $job = new Job();

        $job->setPosition('backend developer');
        $job->setDescription(null);

        $manager->persist($job);
        $manager->flush();

        $this->addReference(self::BACK_END_DEV, $job);
    }
}
