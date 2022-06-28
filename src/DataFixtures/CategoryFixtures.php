<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY1 =  '10';
    public const CATEGORY2 = '8';
    public const CATEGORY3 = '9';

    public function load(ObjectManager $manager): void
    {
         $category1 = new Category();
         $category1->setName("FrontEnd");
         $category2 = new Category();
         $category2->setName("BackEnd");
         $category3 = new Category();
         $category3->setName("Autres");
         $manager->persist($category1, $category2, $category3);
         $manager->flush();
         $this->addReference(self::CATEGORY1, $category1);
         $this->addReference(self::CATEGORY2, $category2);
         $this->addReference(self::CATEGORY3, $category3);
    }
}
