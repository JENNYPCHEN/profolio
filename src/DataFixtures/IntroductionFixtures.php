<?php

namespace App\DataFixtures;

use App\Entity\Introduction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IntroductionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $introduction = new Introduction();
         $introduction->setHeroDescription('hero description is here');
         $introduction->setAboutDescription('about description is here');
         $introduction->setLinkedinLink('http://linkedin.com');
         $introduction->setGitHubLink('http://github.com');
         $introduction->setEmail('thisis@email.com');
         $introduction->setTelNo('123456789');
         $introduction->setCVLink('ChingYi_PC_CV.pdf');
         $manager->persist($introduction);

        $manager->flush();
    }
}
