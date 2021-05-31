<?php

namespace App\Controller;

use App\Entity\House;
use App\Entity\Philosophy;
use App\Entity\Seo;
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
        $houses = $this->getDoctrine()->getRepository(House::class)->findBy(['public'=>true]);
        $seo = $this->getDoctrine()->getRepository(Seo::class)->findOneBy([]);
        $philosophy = $this->getDoctrine()->getRepository(Philosophy::class)->findOneBy([]);
        return $this->render('home/index.html.twig', [
            'seo' => $seo,
            'philosophy' => $philosophy,
            'houses' => $houses
        ]);
    }
}
