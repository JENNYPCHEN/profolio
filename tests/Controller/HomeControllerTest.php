<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends WebTestCase
{
    public function testHomepageIsShownCorrectly(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1','Ching Yi, PELGRIMS CHEN');

    }
    public function testContactFormWorksCorrectly(): void
    {
        $client = static::createClient();
        $client->request('GET', '/#contact');


    }
    private function fillForm($crawler, $client, $name, $email,$subject,$message,$checkbox)
    {
        $form = $crawler->selectButton('Envoyer')->form([
            'contact[nom]' => $name,
            'contact[email]' => $email,
            'contact[subjet]' => $subject,
            'contact[message]' => $message,
            'contact[agreeTerms]'=> $checkbox,
        ]);
        $client->submit($form);
    }
}
