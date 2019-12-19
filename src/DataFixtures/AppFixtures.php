<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formations;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $formationDUTInfo = new Formations();
		$formationDUTInfo->setNom("DUT Informatique");
        $manager->persist($formationDUTInfo);

        $manager->flush();
    }
}
