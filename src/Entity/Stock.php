<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockRepository::class)]
class Stock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Quantité_stock = null;

    #[ORM\Column]
    private ?int $Quantité_min = null;

    /**
     * @var Collection<int, Articles>
     */
    #[ORM\OneToMany(targetEntity: Articles::class, mappedBy: 'Id_Stock')]
    private Collection $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantitéStock(): ?int
    {
        return $this->Quantité_stock;
    }

    public function setQuantitéStock(int $Quantité_stock): static
    {
        $this->Quantité_stock = $Quantité_stock;

        return $this;
    }

    public function getQuantitéMin(): ?int
    {
        return $this->Quantité_min;
    }

    public function setQuantitéMin(int $Quantité_min): static
    {
        $this->Quantité_min = $Quantité_min;

        return $this;
    }

    /**
     * @return Collection<int, Articles>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Articles $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->setIdStock($this);
        }

        return $this;
    }

    public function removeArticle(Articles $article): static
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getIdStock() === $this) {
                $article->setIdStock(null);
            }
        }

        return $this;
    }
}
