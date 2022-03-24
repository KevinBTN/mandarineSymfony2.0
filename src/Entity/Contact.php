<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\OneToMany(targetEntity=ContactDisponibilite::class, mappedBy="contactId")
     */
    private $contactDisponibilites;

    /**
     * @ORM\OneToMany(targetEntity=Gite::class, mappedBy="contactId")
     */
    private $gites;

    public function __construct()
    {
        $this->contactDisponibilites = new ArrayCollection();
        $this->gites = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * @return Collection<int, ContactDisponibilite>
     */
    public function getContactDisponibilites(): Collection
    {
        return $this->contactDisponibilites;
    }

    public function addContactDisponibilite(ContactDisponibilite $contactDisponibilite): self
    {
        if (!$this->contactDisponibilites->contains($contactDisponibilite)) {
            $this->contactDisponibilites[] = $contactDisponibilite;
            $contactDisponibilite->setContactId($this);
        }

        return $this;
    }

    public function removeContactDisponibilite(ContactDisponibilite $contactDisponibilite): self
    {
        if ($this->contactDisponibilites->removeElement($contactDisponibilite)) {
            // set the owning side to null (unless already changed)
            if ($contactDisponibilite->getContactId() === $this) {
                $contactDisponibilite->setContactId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Gite>
     */
    public function getGites(): Collection
    {
        return $this->gites;
    }

    public function addGite(Gite $gite): self
    {
        if (!$this->gites->contains($gite)) {
            $this->gites[] = $gite;
            $gite->setContactId($this);
        }

        return $this;
    }

    public function removeGite(Gite $gite): self
    {
        if ($this->gites->removeElement($gite)) {
            // set the owning side to null (unless already changed)
            if ($gite->getContactId() === $this) {
                $gite->setContactId(null);
            }
        }

        return $this;
    }
}
