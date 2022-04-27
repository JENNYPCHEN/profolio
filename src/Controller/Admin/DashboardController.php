<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\Image;
use App\Entity\Introduction;
use App\Entity\Project;
use App\Entity\Skill;
use App\Entity\Tag;
use App\Entity\User;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
         $routeBuilder = $this->container->get(AdminUrlGenerator::class);
         $url = $routeBuilder->setController(ProjectCrudController::class)->generateUrl();
         return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ChingYi P.C');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Projects');
        yield MenuItem::linkToCrud('Add Project','fa fa-tags',Project::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Show Projects','fa fa-eye',Project::class);
        yield MenuItem::linkToCrud('Add Image','fa fa-tags',Image::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Show Image','fa fa-eye',Image::class);
        yield MenuItem::linkToCrud('Add Tag','fa fa-tags',Tag::class)->setAction(Crud::PAGE_NEW);
        yield MenuItem::linkToCrud('Show Tag','fa fa-eye',Tag::class);

        yield MenuItem::section('Skills');
        yield MenuItem::subMenu('Skills')->setSubItems([
         MenuItem::linkToCrud('Add Skill','fa fa-tags',Skill::class)->setAction(Crud::PAGE_NEW),
         MenuItem::linkToCrud('Show Skills','fa fa-eye',Skill::class),
         MenuItem::linkToCrud('Add Category','fa fa-tags',Category::class)->setAction(Crud::PAGE_NEW),
         MenuItem::linkToCrud('Show Category','fa fa-eye',Category::class),
        ]);

        yield MenuItem::section('Personalisation');
        yield MenuItem::subMenu('Personalisation')->setSubItems([
         MenuItem::linkToCrud('Add Detail','fa fa-tags',Introduction::class)->setAction(Crud::PAGE_NEW),
         MenuItem::linkToCrud('Show Detail','fa fa-eye',Introduction::class),
        ]);

        yield MenuItem::section('User Management');
        yield MenuItem::subMenu('User Management')->setSubItems([
            MenuItem::linkToCrud('Add User','fa fa-tags',User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show User','fa fa-eye',User::class),
           ]);

        

    }

}
