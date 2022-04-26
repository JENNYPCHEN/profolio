<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $path;

    #[ORM\Column(type: 'string', length: 255)]
    private $figcaption;

    #[ORM\ManyToOne(targetEntity: project::class, inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private $projects;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getFigcaption(): ?string
    {
        return $this->figcaption;
    }

    public function setFigcaption(string $figcaption): self
    {
        $this->figcaption = $figcaption;

        return $this;
    }

    public function getProjects(): ?project
    {
        return $this->projects;
    }

    public function setProjects(?project $projects): self
    {
        $this->projects = $projects;

        return $this;
    }
}
