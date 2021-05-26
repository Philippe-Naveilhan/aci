<?php

namespace App\Controller;

use App\Entity\Philosophy;
use App\Form\PhilosophyType;
use App\Repository\PhilosophyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gestion/philosophy")
 */
class PhilosophyController extends AbstractController
{
    /**
     * @Route("/new", name="philosophy_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $verifIsPhilosophyExist = $this->getDoctrine()->getRepository(Philosophy::class)->findOneBy([]);
        if (isset($verifIsPhilosophyExist)){
            return $this->redirectToRoute('philosophy_edit');
        }
        $philosophy = new Philosophy();
        $form = $this->createForm(PhilosophyType::class, $philosophy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($philosophy);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('philosophy/new.html.twig', [
            'philosophy' => $philosophy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit", name="philosophy_edit", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
        $philosophy = $this->getDoctrine()->getRepository(Philosophy::class)->findOneBy([]);
        if (!isset($philosophy)){
            return $this->redirectToRoute('philosophy_new');
        }
        $form = $this->createForm(PhilosophyType::class, $philosophy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('philosophy/edit.html.twig', [
            'philosophy' => $philosophy,
            'form' => $form->createView(),
        ]);
    }
}
