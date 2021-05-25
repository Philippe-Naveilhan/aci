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
     * @Route("/", name="seo", methods={"GET"})
     */
    public function index(SeoRepository $seoRepository): Response
    {
        return $this->render('seo/index.html.twig', [
            'seos' => $seoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="seo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $seo = new Seo();
        $form = $this->createForm(SeoType::class, $seo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($seo);
            $entityManager->flush();

            return $this->redirectToRoute('seo');
        }

        return $this->render('seo/new.html.twig', [
            'seo' => $seo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="seo_show", methods={"GET"})
     */
    public function show(Seo $seo): Response
    {
        return $this->render('seo/show.html.twig', [
            'seo' => $seo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="seo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Seo $seo): Response
    {
        $form = $this->createForm(SeoType::class, $seo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('seo');
        }

        return $this->render('seo/edit.html.twig', [
            'seo' => $seo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="seo_delete", methods={"POST"})
     */
    public function delete(Request $request, Seo $seo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$seo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($seo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('seo');
    }
}
