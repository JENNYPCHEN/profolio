<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\IntroductionRepository;
use App\Repository\CategoryRepository;
use App\Repository\ProjectRepository;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use App\Service\EmailService;


class HomeController extends AbstractController
{
    private $introductionRepository;
    private $categoryRepository;
    private $projectRepository;
    private $emailService;

    public function __construct(introductionRepository $introductionRepository, CategoryRepository $categoryRepository, ProjectRepository $projectRepository, EmailService $emailService)
    {
        $this->introductionRepository= $introductionRepository;
        $this->categoryRepository = $categoryRepository;
        $this->projectRepository=$projectRepository;
        $this->emailService=$emailService;
    }
    #[Route('/', name: 'home')]
    
    public function index(Request $request): Response
    {
        $introduction=$this->introductionRepository->findAll();
        $frontend=$this->categoryRepository->findBy(['name'=>'Frontend']);
        $backend=$this->categoryRepository->findBy(['name'=>'Backend']);
        $other=$this->categoryRepository->findBy(['name'=>'Autres']);
        $project=$this->projectRepository->findAll();

        $form = $this->createForm(ContactType::class);
       $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->emailService->sendEmail($form);
            $this->addFlash('success', 'Merci pour votre message. Je vous répondrai dans les plus brefs délais.');
             return $this->redirectToRoute('home');
        }
    
        return $this->render('home/index.html.twig', [
            'introductions' => $introduction,
            'frontends'=> $frontend,
            'backends'=> $backend,
            'others'=>$other,
            'projects'=>$project,
            'form' => $form->createView()
        
        
        ]);
    }
}
