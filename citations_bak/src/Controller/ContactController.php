<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use Exception;
use PharIo\Manifest\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {

        $data = new ContactDTO();

        //todo: enlever la suite :
        $data->name = 'john doe';
        $data->email = 'john@doe.fr';
        $data->message = 'le test';

        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);
        if ($form->IsSubmitted() && $form->isValid()) {
            try{
            $mail = (new TemplatedEmail())
            ->to($data -> services)
            ->from($data->email)
            ->subject('Demande de Contact')
            ->htmlTemplate('emails/contact.html.twig')
            ->context(['data' => $data]);
                    $mailer->send($mail);
                }catch (Exception $e) {
                    $this->addFlash('danger', 'Impossible d\'envoyer votre mail');
                }
            $this->addFlash('success', 'Le mail a bien été envoyé');
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact/contact.html.twig', [
            'form' => $form,
        ]);
    }
}
