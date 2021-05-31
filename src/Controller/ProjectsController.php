<?php

namespace App\Controller;

use App\Entity\House;
use App\Repository\SeoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    /**
     * @Route("/{id}/projects", name="projects")
     */
    public function index(House $house, SeoRepository $seoRepository): Response
    {
        $array = [
            ['Titre 1','interiors-1.webp', "Salon chic et sobre, il accompagnera vos soirées entre amis autant que vos moments familiaux privilégiés..."],
            ['Titre 2', 'interiors-2.webp', "Le blanc nu ouvre l'esprit. Emplacement idéal pour des séances de méditation, yoga, ou pourquoi pas, travail... "],
            ['Titre 3', 'interiors-3.webp', "Esprit norvégien pour ce salon où se retrouver les journées d'hiver."],
            ['Titre 4', 'interiors-4.webp', "Le blanc nu ouvre l'esprit. Emplacement idéal pour des séances de méditation, yoga, ou pourquoi pas, travail... Le blanc nu ouvre l'esprit. Emplacement idéal pour des séances de méditation, yoga, ou pourquoi pas, travail..."],
            ['Titre 5', 'interiors-5.webp', "Cette chambre de 24m2 ravira vos réveils avec sa vue sur le parc. Orientée sud, elle se laisse inondée de lumière toute la journée."]
        ];

        $seo = $seoRepository->findOneBy([]);
        return $this->render('projects/index.html.twig', [
            'house' => $house,
            'seo' => $seo,
            'array' => $array,
        ]);
    }
}
