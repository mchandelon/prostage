<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProstageController extends AbstractController
{
    /**
     * @Route("/", name="prostage_accueil")
     */
    public function accueil()
    {
        return $this->render('prostage/index.html.twig');
    }
	/**
     * @Route("/entreprises", name="prostage_entreprises")
     */
    public function enreprises()
    {
		return $this->render('prostage/entreprises.html.twig');
    }
	/**
     * @Route("/formations", name="prostage_formations")
     */
    public function formations()
    {
		return $this->render('prostage/formations.html.twig');
    }
	/**
     * @Route("/stages/{id}", name="prostage_stages")
     */
    public function stages($id)
    {
        return $this->render('prostage/affichageStage.html.twig',['idRessource' => $id]);
    }
}
