<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\PasswordHasher\Command\UserPasswordHashCommand;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserCrudController extends AbstractCrudController
{

    protected $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher){
        $this->passwordHasher=$passwordHasher;
    }  
    
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('username'),
            TextField::new('password')->hideOnIndex(),
        ];
    }
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        /** @var User $user */
        $user = $entityInstance;
        $plainPassword = $user->getPassword();
        $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);
        parent::persistEntity($entityManager, $user);
    }
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $user = $entityInstance;
        $plainPassword = $user->getPassword();
        $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);
        parent::updateEntity($entityManager,$user);
        
    }
    
}
