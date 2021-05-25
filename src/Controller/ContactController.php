<?php

namespace App\Controller;

use App\Repository\SeoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(SeoRepository $seoRepository): Response
    {
        $seo = $seoRepository->findOneBy([]);
        return $this->render('contact/index.html.twig', [
            'seo' => $seo,
            'controller_name' => 'ContactController'
        ]);
    }
}
