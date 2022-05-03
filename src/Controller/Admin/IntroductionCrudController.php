<?php

namespace App\Controller\Admin;

use App\Entity\Introduction;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class IntroductionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Introduction::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('linkedinLink'),
            ImageField::new('CVLink')->setBasePath('build')
            ->setUploadDir('public/build')
            ->setFormTypeOption('required' ,false),
            TextField::new('gitHubLink'),
            EmailField::new('email'),
            TelephoneField::new('telNo'),
            TextField::new('heroDescription'),
            TextEditorField::new('aboutDescription'),
        ];
    }
    
}
