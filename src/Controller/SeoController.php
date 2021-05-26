<?php

namespace App\Controller;

use App\Entity\Seo;
use App\Form\SeoType;
use App\Repository\SeoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gestion/seo")
 */
class SeoController extends AbstractController
{
    /**
     * @Route("/new", name="seo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $verifIfSeoExist = $this->getDoctrine()->getRepository(Seo::class)->findOneBy([]);
        if(isset($verifIfSeoExist)){
            return $this->redirectToRoute('seo');
        }

        $seo = new Seo();
        $form = $this->createForm(SeoType::class, $seo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($seo);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('seo/new.html.twig', [
            'seo' => $seo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit", name="seo", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
        $seo = $this->getDoctrine()->getRepository(Seo::class)->findOneBy([]);
        if(!isset($seo)){
            return $this->redirectToRoute('seo_new');
        }
        $form = $this->createForm(SeoType::class, $seo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('seo/edit.html.twig', [
            'seo' => $seo,
            'form' => $form->createView(),
        ]);
    }
}
