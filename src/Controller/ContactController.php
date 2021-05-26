<?php

namespace App\Controller;

use App\Entity\Contact;
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
        $contact = $this->getDoctrine()->getRepository(Contact::class)->findOneBy([]);
        return $this->render('contact/index.html.twig', [
            'seo' => $seo,
            'contact' => $contact,
            'controller_name' => 'ContactController'
        ]);
    }
}
