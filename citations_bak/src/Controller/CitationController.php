<?php

namespace App\Controller;

use App\Repository\CitationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
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
    public function edit(CitationsRepository $citationsRepo): Response
    {
        $citations = $citationsRepo->findAll();
        return $this->render('citation/index.html.twig', parameters:['citations' => $citations]);
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
}