<?php

namespace App\Entity;

use App\Repository\EmplacementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmplacementRepository::class)
 */
class Emplacement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Regions::class, inversedBy="emplacements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity=Departments::class, inversedBy="emplacements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;

    /**
     * @ORM\ManyToOne(targetEntity=Cities::class, inversedBy="emplacements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegion(): ?regions
    {
        return $this->region;
    }

    public function setRegion(?regions $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getDepartement(): ?Departments
    {
        return $this->departement;
    }

    public function setDepartement(?Departments $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getVille(): ?Cities
    {
        return $this->ville;
    }

    public function setVille(?Cities $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}