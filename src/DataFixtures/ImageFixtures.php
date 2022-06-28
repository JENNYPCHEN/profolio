<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImageFixtures extends Fixture
{
    public const IMAGE1 =  '1';
    public const IMAGE2 =  '2';
    public const IMAGE3 =  '3';
    public const IMAGE4 =  '4';
    public function load(ObjectManager $manager): void
    {
         $image1 = new Image();
         $image1->setPath("project2pic1.png");
         $image1->setFigcaption('example1');
         $image2 = new Image();
         $image2->setPath("project2pic2.png");
         $image2->setFigcaption("example2");
         $image3 = new Image();
         $image3->setPath("project3pic1.png");
         $image3->setFigcaption("example3");
         $image4 = new Image();
         $image4->setPath("project3pic2.png");
         $image4->setFigcaption("example4");
         $manager->persist($image1, $image2, $image3, $image4);

        $manager->flush();
        $this->addReference(self::IMAGE1, $image1);
        $this->addReference(self::IMAGE2, $image2);
        $this->addReference(self::IMAGE3, $image3);
        $this->addReference(self::IMAGE4, $image4);
    }
}
