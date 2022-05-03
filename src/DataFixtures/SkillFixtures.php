<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repository\CategoryRepository;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SkillFixtures extends Fixture implements DependentFixtureInterface
{
    private $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository){
        $this->categoryRepository=$categoryRepository;
    }
    public function load(ObjectManager $manager): void
    {
         $skill1 = new Skill();
         $skill1->setName('skill1');
         $skill1->setLevel('50');
         $skill1->setLogo('html.png');
         $skill1->setCategory($this->getReference(CategoryFixtures::CATEGORY1));

         $skill2 = new Skill();
         $skill2->setName('skill2');
         $skill2->setLevel('50');
         $skill2->setLogo('css.png');
         $skill2->setCategory($this->getReference(CategoryFixtures::CATEGORY2));

         $skill3 = new Skill();
         $skill3->setName('skill3');
         $skill3->setLevel('80');
         $skill3->setLogo('scss.png');
         $skill3->setCategory($this->getReference(CategoryFixtures::CATEGORY3));

         $manager->persist($skill1,$skill2,$skill3);

        $manager->flush();
    }
    public function getDependencies(): array
	{
		return [
			CategoryFixtures::class,
		];
	}
}
