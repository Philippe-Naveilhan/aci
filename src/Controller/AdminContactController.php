<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gestion/contact")
 */
class AdminContactController extends AbstractController
{
    /**
     * @Route("/new", name="admin_contact_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $verifIfContactExist = $this->getDoctrine()->getRepository(Contact::class)->findOneBy([]);
        if(isset($verifIfContactExist)){
            return $this->redirectToRoute('admin_contact_edit');
        }
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('contact');
        }

        return $this->render('admin_contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit", name="admin_contact_edit", methods={"GET","POST"})
     */
    public function edit(Request $request): Response
    {
        $contact = $this->getDoctrine()->getRepository(Contact::class)->findOneBy([]);
//        dd($contact);
        if(!isset($contact)){
            return $this->redirectToRoute('admin_contact_new');
        }
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contact');
        }

        return $this->render('admin_contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }
}
