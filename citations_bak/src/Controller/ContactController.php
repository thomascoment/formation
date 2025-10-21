<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use PharIo\Manifest\Email;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email as MimeEmail;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact.index')]
    public function contact(Request $request): Response
    {
        
        $data = new ContactDTO();
        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);
        if($form->IsSubmitted() && $form->isValid()){
            //Envoyer Email
        }
        return $this->render('contact.html.twig', [
            'form' => $form,
        ]);
    }
}
