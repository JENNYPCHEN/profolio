<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        $user1=new User;
        $user1->setUsername('admin');
        $user1->setRoles(['ROLE_ADMIN']);
        $password = $this->hasher->hashPassword($user1, '12345678');
        $user1->setPassword($password);
        $manager->persist($user1);
        $manager->flush();
    }
}
