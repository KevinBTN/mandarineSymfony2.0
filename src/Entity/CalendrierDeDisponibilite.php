<?php

namespace App\Entity;

use App\Repository\CalendrierDeDisponibiliteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CalendrierDeDisponibiliteRepository::class)
 */
class CalendrierDeDisponibilite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=Gite::class, inversedBy="calendrierDeDisponibilites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $giteId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getGiteId(): ?gite
    {
        return $this->giteId;
    }

    public function setGiteId(?gite $giteId): self
    {
        $this->giteId = $giteId;

        return $this;
    }
}