<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Formations;
use App\Entity\Entreprises;
use App\Entity\Stage;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
		//Création générateur de données Faker
		$faker = \Faker\Factory::create('fr_FR');
		
		//Création des formations
		$formationDUTInfo = new Formations();
		$formationDUTInfo->setNom("DUT Informatique");
		
		$formationLPProgAv = new Formations();
		$formationLPProgAv->setNom("License Pro Programmation Avancée");
		
		$formationBTSSIO = new Formations();
		$formationBTSSIO->setNom("BTS SIO");
		
		$tableauFormations=array ($formationDUTInfo,$formationLPProgAv,$formationBTSSIO);
		
		foreach ($tableauFormations as $formation){
			$manager->persist($formation);
		}
		
		//Nombre d'entreprises
		$nbEntreprises=15;
		//Boucle qui crée des formations alléatoires
		for ($i=1; $i <= $nbEntreprises; $i++){
			$entreprise = new Entreprises();
			$entreprise->setNom($faker->catchPhrase);
			$entreprise->setAdresse($faker->streetAddress);
			$entreprise->setActivite($faker->realText ($maxNbChars = 30, $indexSize = 2));
			$entreprise->setLienSite($faker->url);
			
			$tableauEntreprises[$i-1]=$entreprise;
			
			$manager->persist($entreprise);
		}
		
		//Nombre de stages
		$nbStages=15;
		//Boucle qui crée des formations alléatoires
		for ($i=1; $i <= $nbStages; $i++){
			$unStage = new Stage();
			$unStage->setTitre($faker->catchPhrase);
			$unStage->setDescription($faker->realText ($maxNbChars = 1000, $indexSize = 2));
			$unStage->setEmail($faker->email);
			
			$numFormation = $faker->numberBetween($min = 0, $max = 2);
			$unStage->AddFormation($tableauFormations[$numFormation]);
			
			$numEntreprise=$faker->numberBetween($min=0,$max=$nbEntreprises-1);
			$unStage->setEntreprise($tableauEntreprises[$numEntreprise]);
			$tableauEntreprises[$numEntreprise]->addStage($unStage);
			
			$manager->persist($unStage);
			$manager->persist($tableauEntreprises[$numEntreprise]);
		}
		//Envoyer les données en base de données
        $manager->flush();
    }
}
