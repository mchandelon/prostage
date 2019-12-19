<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formations;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
		//Création générateur de données Faker
		$faker = \Faker\Factory::create('fr_FR');
		//Nombre de formations
		$nbFormations=15;
		//Boucle qui crée des formations alléatoires
		for ($i=1; $i <= $nbFormations; $i++){
			$formationDUTInfo = new Formations();
			$formationDUTInfo->setNom($faker->realText($maxNbChars = 100, $indexSize = 2));
			$manager->persist($formationDUTInfo);
		}
		//Envoyer les données en base de données
        $manager->flush();
    }
}
