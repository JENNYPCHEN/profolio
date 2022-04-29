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
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class HomeController extends AbstractController
{
    private $introductionRepository;
    private $categoryRepository;
    private $projectRepository;
    public function __construct(introductionRepository $introductionRepository, CategoryRepository $categoryRepository, ProjectRepository $projectRepository)
    {
        $this->introductionRepository= $introductionRepository;
        $this->categoryRepository = $categoryRepository;
        $this->projectRepository=$projectRepository;
    }
    #[Route('/', name: 'home')]
    
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $introduction=$this->introductionRepository->findAll();
        $frontend=$this->categoryRepository->findBy(['name'=>'Frontend']);
        $backend=$this->categoryRepository->findBy(['name'=>'Backend']);
        $other=$this->categoryRepository->findBy(['name'=>'Autres']);
        $project=$this->projectRepository->findAll();
        $form = $this->createForm(ContactType::class);
       

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
