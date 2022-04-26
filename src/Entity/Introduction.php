<?php

namespace App\Entity;

use App\Repository\IntroductionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IntroductionRepository::class)]
class Introduction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $heroDescription;

    #[ORM\Column(type: 'text')]
    private $aboutDescription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeroDescription(): ?string
    {
        return $this->heroDescription;
    }

    public function setHeroDescription(string $heroDescription): self
    {
        $this->heroDescription = $heroDescription;

        return $this;
    }

    public function getAboutDescription(): ?string
    {
        return $this->aboutDescription;
    }

    public function setAboutDescription(string $aboutDescription): self
    {
        $this->aboutDescription = $aboutDescription;

        return $this;
    }
}
