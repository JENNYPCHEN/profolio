<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();
            $message = (new Email())
                ->from($contactFormData['email'])
                ->to('pelgrims.chenchingyi@gmail.com')
                ->subject('You got mail')
                ->text(
                    'Sender : ' . $contactFormData['email'] . \PHP_EOL .
                        $contactFormData['subjet'],
                    $contactFormData['message'],
                    'text/plain'
                );
            $mailer->send($message);
            $this->addFlash('success', 'Merci pour votre message. Je vous répondrai dans les plus brefs délais.');
            return $this->redirectToRoute('home');
        }
        $this->addFlash('success', 'something went wrong');
        return $this->render('/home/sectionContact.html.twig',[ 'form' => $form->createView()]);
    }
}
