<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\IntroductionRepository;
use App\Repository\ProjectRepository;
use App\Entity\Project;


class ProjectController extends AbstractController
{
    private $introductionRepository;
    private $projectRepository;
    public function __construct(IntroductionRepository $introductionRepository, ProjectRepository $projectRepository){
        $this->introductionRepository=$introductionRepository;
        $this->projectRepository=$projectRepository;
    }
    #[Route('/project/{slug}', name: 'project')]
    public function index(Project $project): Response
    {
        $projects=$this->projectRepository->findAll();
        $introduction=$this->introductionRepository->findAll();
        return $this->render('project/index.html.twig', [
            'introductions' => $introduction,
            'projects' => $projects,
            'individualProject'=>$project,
        ]);
    }
}
