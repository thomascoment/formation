<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerInterface;
use Symfony\Component\HttpFoundation\Request;

final class AuthorController extends AbstractController
{
    #[Route('/author', name: 'author.index')]
    public function index(AuthorRepository $authorRepo): Response
    {
        $authors = $authorRepo->findAll();
        return $this->render('author/index.html.twig', parameters:['authors' => $authors]);
    }

    #[Route('author/edit/{id}', name:'author.edit', methods:['GET', 'POST'])]
    public function edit(Author $author, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $author->setUpdatedAt(new DateTimeImmutable());
            $em->flush();
            $this->addFlash('success', 'L\'auteur a bien été modifié');
            return $this->redirectToRoute('author.index');
        }
        return $this->render('author/edit.html.twig', parameters:[
            'author'=> $author,
            'form' => $form
        ]);
    }

    #[Route('/author/show/{id}', name: 'author.one')]
    public function show(AuthorRepository $authorsRepo, HtmlSanitizerInterface $htmlSanitizer, int $id): Response
    {
        $author = $authorsRepo->find($id);
        $biography = $author->getBiography();
        $sanitizer = $htmlSanitizer->sanitize($biography);

        return $this->render('author/one.html.twig', parameters:[
            'author' => $author,
            'id' => $id,
            'biography' => $sanitizer
        ]);
    }

    #[Route('author/add', name: 'author.add')]
    public function add(Request $request, EntityManagerInterface $em, ): Response
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $author->setCreatedAt(new DateTimeImmutable());
            $author->setUpdatedAt(new DateTimeImmutable());
            $em->persist($author);
            $em->flush();
            $this->addFlash('success', 'L\'auteur a bien été ajouté');
            return $this->redirectToRoute('author.index');
        }
        return $this->render('author/add.html.twig', parameters: [
            'form' => $form
        ]);
    }

    #[Route('author/{id}', name: 'author.delete', methods: ['DELETE'])]
    public function delete(Author $author, EntityManagerInterface $em): Response
    {
        $em->remove($author);
        $em->flush();
        $this->addFlash('success', 'L\'auteur a bien été supprimé');
        return $this->redirectToRoute('author.index');
    }
}