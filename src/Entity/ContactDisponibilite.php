<?php

namespace App\Entity;

use App\Repository\ContactDisponibiliteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactDisponibiliteRepository::class)
 */
class ContactDisponibilite
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
    private $jour;

    /**
     * @ORM\Column(type="time")
     */
    private $haureDebut;

    /**
     * @ORM\Column(type="time")
     */
    private $heureFin;

    /**
     * @ORM\ManyToOne(targetEntity=Contact::class, inversedBy="contactDisponibilites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contactId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getHaureDebut(): ?\DateTimeInterface
    {
        return $this->haureDebut;
    }

    public function setHaureDebut(\DateTimeInterface $haureDebut): self
    {
        $this->haureDebut = $haureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getContactId(): ?contact
    {
        return $this->contactId;
    }

    public function setContactId(?contact $contactId): self
    {
        $this->contactId = $contactId;

        return $this;
    }
}