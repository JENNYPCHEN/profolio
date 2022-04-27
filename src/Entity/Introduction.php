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

    #[ORM\Column(type: 'string', length: 255)]
    private $linkedinLink;

    #[ORM\Column(type: 'string', length: 255)]
    private $CVLink;

    #[ORM\Column(type: 'string', length: 255)]
    private $gitHubLink;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    #[ORM\Column(type: 'string', length: 255)]
    private $telNo;

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

    public function getLinkedinLink(): ?string
    {
        return $this->linkedinLink;
    }

    public function setLinkedinLink(string $linkedinLink): self
    {
        $this->linkedinLink = $linkedinLink;

        return $this;
    }

    public function getCVLink(): ?string
    {
        return $this->CVLink;
    }

    public function setCVLink(string $CVLink): self
    {
        $this->CVLink = $CVLink;

        return $this;
    }

    public function getGitHubLink(): ?string
    {
        return $this->gitHubLink;
    }

    public function setGitHubLink(string $gitHubLink): self
    {
        $this->gitHubLink = $gitHubLink;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelNo(): ?string
    {
        return $this->telNo;
    }

    public function setTelNo(string $telNo): self
    {
        $this->telNo = $telNo;

        return $this;
    }
}
