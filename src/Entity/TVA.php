<?php

namespace App\Entity;

use App\Repository\TVARepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TVARepository::class)]
class TVA
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $Taux = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'tVAs')]
    private ?self $Id_TVA = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'Id_TVA')]
    private Collection $tVAs;

    public function __construct()
    {
        $this->tVAs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaux(): ?float
    {
        return $this->Taux;
    }

    public function setTaux(float $Taux): static
    {
        $this->Taux = $Taux;

        return $this;
    }

    public function getIdTVA(): ?self
    {
        return $this->Id_TVA;
    }

    public function setIdTVA(?self $Id_TVA): static
    {
        $this->Id_TVA = $Id_TVA;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getTVAs(): Collection
    {
        return $this->tVAs;
    }

    public function addTVA(self $tVA): static
    {
        if (!$this->tVAs->contains($tVA)) {
            $this->tVAs->add($tVA);
            $tVA->setIdTVA($this);
        }

        return $this;
    }

    public function removeTVA(self $tVA): static
    {
        if ($this->tVAs->removeElement($tVA)) {
            // set the owning side to null (unless already changed)
            if ($tVA->getIdTVA() === $this) {
                $tVA->setIdTVA(null);
            }
        }

        return $this;
    }
}
