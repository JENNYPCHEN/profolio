<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public const TAG1 =  '5';
    public const TAG2 =  '6';
    public const TAG3 =  '7';
    public function load(ObjectManager $manager): void
    {
         $tag1 = new Tag();
         $tag1->setName('tag1');
         $tag2= new Tag;
         $tag2->setName('Tag2');
         $tag3= new Tag;
         $tag3->setName('Tag3');
         $manager->persist($tag1,$tag2,$tag3);

        $manager->flush();
        $this->addReference(self::TAG1, $tag1);
        $this->addReference(self::TAG2, $tag2);
        $this->addReference(self::TAG3, $tag3);
    }
}
