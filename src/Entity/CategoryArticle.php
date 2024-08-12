<?php

namespace App\Entity;

use App\Repository\CategoryArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryArticleRepository::class)]
class CategoryArticle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_category = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategory(): ?string
    {
        return $this->Nom_category;
    }

    public function setNomCategory(string $Nom_category): static
    {
        $this->Nom_category = $Nom_category;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }
}
