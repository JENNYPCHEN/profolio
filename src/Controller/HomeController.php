<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\IntroductionRepository;
use App\Repository\CategoryRepository;

class HomeController extends AbstractController
{
    private $introductionRepository;
    private $categoryRepository;
    public function __construct(introductionRepository $introductionRepository, CategoryRepository $categoryRepository)
    {
        $this->introductionRepository= $introductionRepository;
        $this->categoryRepository = $categoryRepository;
    }
    #[Route('/', name: 'home')]
    
    public function index(): Response
    {
        $introduction=$this->introductionRepository->findAll();
        $frontend=$this->categoryRepository->findBy(['name'=>'Frontend']);
        $backend=$this->categoryRepository->findBy(['name'=>'Backend']);
        $other=$this->categoryRepository->findBy(['name'=>'Autres']);
        return $this->render('home/index.html.twig', [
            'introductions' => $introduction,
            'frontends'=> $frontend,
            'backends'=> $backend,
            'others'=>$other,
        
        ]);
    }
}
