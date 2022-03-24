<?php

namespace App\Entity;

use App\Repository\GiteOptionPrixRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GiteOptionPrixRepository::class)
 */
class GiteOptionPrix
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Gite::class, inversedBy="giteOptionPrixes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idGite;

    /**
     * @ORM\ManyToOne(targetEntity=Option::class, inversedBy="giteOptionPrixes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idOption;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGite(): ?gite
    {
        return $this->idGite;
    }

    public function setIdGite(?gite $idGite): self
    {
        $this->idGite = $idGite;

        return $this;
    }

    public function getIdOption(): ?option
    {
        return $this->idOption;
    }

    public function setIdOption(?option $idOption): self
    {
        $this->idOption = $idOption;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}