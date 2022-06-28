<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Repository\ImageRepository;
use App\Repository\TagRepository;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    private $imageRepository;
    private $tagRepository;
    public function __construct(ImageRepository $imageRepository, TagRepository $tagRepository){
        $this->imageRepository=$imageRepository;
        $this->tagRepository=$tagRepository;
    }
    public function load(ObjectManager $manager): void
    {
         $project = new Project();
         $project->setName('project2');
         $project->setShortDescription('project2 short description');
         $project->setLongDescription('project2 long description');
         $project->setSlug('project2');
         $project->setCreatedAt(new \DateTimeImmutable(sprintf('-%d days', rand(1, 50))));
         $project->addImage($this->getReference(ImageFixtures::IMAGE1),$this->getReference(ImageFixtures::IMAGE2));
         $project->addTag($this->getReference(TagFixtures::TAG1),$this->getReference(TagFixtures::TAG2));

         $project1 = new Project();
         $project1->setName('project3');
         $project1->setShortDescription('project3 short description');
         $project1->setLongDescription('project3 long description');
         $project1->setSlug('project3');
         $project1->setCreatedAt(new \DateTimeImmutable(sprintf('-%d days', rand(1, 50))));
         $project1->setGitHubLink("http://github.com/project1");
         $project1->addImage($this->getReference(ImageFixtures::IMAGE3),$this->getReference(ImageFixtures::IMAGE4));
         $project1->addTag($this->getReference(TagFixtures::TAG3),$this->getReference(TagFixtures::TAG2));


         $manager->persist($project, $project1);

        $manager->flush();
    }
    public function getDependencies(): array
	{
		return [
			ImageFixtures::class,
            TagFixtures::class
		];
	}
}
