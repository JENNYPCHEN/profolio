<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\IntroductionRepository;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    private $introductionRepository;
    private $authenticationUtils;
    public function __construct(introductionRepository $introductionRepository, AuthenticationUtils $authenticationUtils)
    {
        $this->introductionRepository= $introductionRepository;
        $this->authenticationUtils=$authenticationUtils;

    }
    #[Route('/login', name: 'login')]
    public function index(): Response
    {
        $introduction=$this->introductionRepository->findAll();
        $error = $this->authenticationUtils->getLastAuthenticationError();
        $lastUsername =$this->authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', [
            'introductions' => $introduction,
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
}
