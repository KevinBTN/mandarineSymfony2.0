<?php

namespace App\Entity;

use App\Repository\OptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionRepository::class)
 * @ORM\Table(name="`option`")
 */
class Option
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=GiteOptionPrix::class, mappedBy="idOption")
     */
    private $giteOptionPrixes;

    public function __construct()
    {
        $this->giteOptionPrixes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, GiteOptionPrix>
     */
    public function getGiteOptionPrixes(): Collection
    {
        return $this->giteOptionPrixes;
    }

    public function addGiteOptionPrix(GiteOptionPrix $giteOptionPrix): self
    {
        if (!$this->giteOptionPrixes->contains($giteOptionPrix)) {
            $this->giteOptionPrixes[] = $giteOptionPrix;
            $giteOptionPrix->setIdOption($this);
        }

        return $this;
    }

    public function removeGiteOptionPrix(GiteOptionPrix $giteOptionPrix): self
    {
        if ($this->giteOptionPrixes->removeElement($giteOptionPrix)) {
            // set the owning side to null (unless already changed)
            if ($giteOptionPrix->getIdOption() === $this) {
                $giteOptionPrix->setIdOption(null);
            }
        }

        return $this;
    }
}
