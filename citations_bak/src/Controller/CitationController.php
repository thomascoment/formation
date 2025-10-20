<?php

namespace App\Controller;

use App\Entity\Citations;
use App\Form\CitationType;
use App\Repository\CitationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Config\Framework\HtmlSanitizerConfig;

final class CitationController extends AbstractController
{
    #[Route('/citation', name: 'citation.index')]
    public function index(CitationsRepository $citationsRepo): Response
    {
        $citations = $citationsRepo->findAll();
        return $this->render('citation/index.html.twig', parameters:['citations' => $citations]);
    }

    #[Route('/citation/edit/{id}', name: 'citation.edit')]
    public function edit(Citations $citations, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CitationType::class, $citations);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'La citation a bien été modifiée');
            return $this->redirectToRoute('citation.index');
        }
        return $this->render('citation/edit.html.twig', parameters:[
            'citation' => $citations,
            'form' => $form
        ]);
    }

    #[Route('/citation/show/{id}', name: 'citation.one')]
    public function show(CitationsRepository $citationsRepo, int $id): Response
    {
        $citation = $citationsRepo->find($id);
        return $this->render('citation/one.html.twig', parameters:[
            'citation' => $citation,
            'id' => $id
        ]);
    }

    #[Route('/citations/add', name: 'citation.add')]
    public function add(Request $request, EntityManagerInterface $em, ): Response
    {
        $citation = new Citations();
        $form = $this->createForm(CitationType::class, $citation);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($citation);
            $em->flush();
            $this->addFlash('success', 'La citation a bien été ajouté');
            return $this->redirectToRoute('citation.index');
        }
        return $this->render('citation/add.html.twig', parameters: [
            'form' => $form
        ]);
    }
}