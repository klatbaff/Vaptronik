<?php

namespace App\Entity;

use App\Repository\LigneCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneCommandeRepository::class)]
class LigneCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LigneCommande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLigneCommande(): ?string
    {
        return $this->LigneCommande;
    }

    public function setLigneCommande(string $LigneCommande): static
    {
        $this->LigneCommande = $LigneCommande;

        return $this;
    }
}
