<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class EmailService
{
    private $mailer;
    public function __construct( MailerInterface $mailer)
    {
        $this->mailer=$mailer;
    }
    public function sendEmail($form){
            $contactFormData = $form->getData();
            
            $message = (new Email())
                ->from($contactFormData['email'])
                ->to('pelgrims.chenchingyi@gmail.com')
                ->subject('You got mail.')
                ->text(
                    'Sender : ' . $contactFormData['nom'] . \PHP_EOL .
                    'Sender email : ' . $contactFormData['email'] . \PHP_EOL .
                    'Subject : ' . $contactFormData['subjet'] . \PHP_EOL .
                    'Message : ' . $contactFormData['message'] . \PHP_EOL .
                    'text/plain'
                );
               
            try {
                $this->mailer->send($message);
            } catch (TransportExceptionInterface $e) {

            }
    }
}