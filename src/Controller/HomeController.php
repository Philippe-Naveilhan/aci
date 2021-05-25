<?php

namespace App\Controller;

use App\Repository\SeoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("", name="home")
     */
    public function index(SeoRepository $seoRepository): Response
    {
        $seo = $seoRepository->findOneBy([]);
        return $this->render('home/index.html.twig', [
            'seo' => $seo,
            'controller_name' => 'Accueil'
        ]);
    }
}
