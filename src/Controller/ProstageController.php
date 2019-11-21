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
        return new Response("<h1>Bienvenue sur la page d'accueil de Prostages</h1>");
    }
	/**
     * @Route("/entreprises", name="prostage_entreprises")
     */
    public function enreprises()
    {
        return new Response("<h1>Cette page affichera la liste des entreprises proposant un stage</h1>");
    }
	/**
     * @Route("/formations", name="prostage_formations")
     */
    public function formations()
    {
        return new Response("<h1>Cette page affichera la liste des formations de l'IUT</h1>");
    }
	/**
     * @Route("/stages/{id}", name="prostage_stages")
     */
    public function stages()
    {
        return new Response("<p>Cette page affichera le descriptif du stage ayant pour identifiant </p>");
    }
}
