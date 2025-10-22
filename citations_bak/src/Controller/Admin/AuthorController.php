<?php

namespace App\Controller\Admin;

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

#[Route('/admin/author', name: 'admin.author.')]
final class AuthorController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(AuthorRepository $authorRepo): Response
    {
        $authors = $authorRepo->findAll();
        return $this->render('admin/author/index.html.twig', parameters:['authors' => $authors]);
    }

    #[Route('/{id}', name:'edit', methods:['GET', 'POST'])]
    public function edit(Author $author, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $author->setUpdatedAt(new DateTimeImmutable());
            $em->flush();
            $this->addFlash('success', 'L\'auteur a bien été modifié');
            return $this->redirectToRoute('admin.author.index');
        }
        return $this->render('admin/author/edit.html.twig', parameters:[
            'author'=> $author,
            'form' => $form
        ]);
    }

    #[Route('/add', name: 'add')]
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
            return $this->redirectToRoute('admin.author.index');
        }
        return $this->render('admin/author/add.html.twig', parameters: [
            'form' => $form
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(Author $author, EntityManagerInterface $em): Response
    {
        $em->remove($author);
        $em->flush();
        $this->addFlash('success', 'L\'auteur a bien été supprimé');
        return $this->redirectToRoute('admin.author.index');
    }
}