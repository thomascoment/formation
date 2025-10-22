<?php

namespace App\Controller\Admin;

use App\Entity\Citations;
use App\Form\CitationType;
use App\Repository\CitationsRepository;
use Doctrine\DBAL\Types\DateImmutableType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Config\Framework\HtmlSanitizerConfig;

#[Route("/admin/citations", name: 'admin.citation.')]
final class CitationController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CitationsRepository $citationsRepo): Response
    {
        $citations = $citationsRepo->findAll();
        return $this->render('admin/citation/index.html.twig', parameters:['citations' => $citations]);
    }

    #[Route('/{id}', name: 'edit', methods: ['GET', 'POST'], requirements: ['id' => Requirement::DIGITS])]
    public function edit(Citations $citations, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CitationType::class, $citations);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'La citation a bien été modifiée');
            return $this->redirectToRoute('admin.citation.index');
        }
        return $this->render('admin/citation/edit.html.twig', parameters:[
            'citation' => $citations,
            'form' => $form
        ]);
    }

    #[Route('/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em, ): Response
    {
        $citation = new Citations();
        $form = $this->createForm(CitationType::class, $citation);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($citation);
            $em->flush();
            $this->addFlash('success', 'La citation a bien été ajouté');
            return $this->redirectToRoute('admin.citation.index');
        }
        return $this->render('admin/citation/add.html.twig', parameters: [
            'form' => $form
        ]);
    }


    #[Route('/{id}', name: 'delete', methods: ['DELETE'], requirements: ['id' => Requirement::DIGITS])]
    public function delete(Citations $citation, EntityManagerInterface $em): Response
    {
        $em->remove($citation);
        $em->flush();
        $this->addFlash('success', 'La citation a bien été supprimé');
        return $this->redirectToRoute('admin.citation.index');
    }
}