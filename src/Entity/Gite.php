<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;



/**
 * Gite
 * @ORM\Entity
 */
#[ORM\Entity(repositoryClass: GiteRepository::class)]
class Gite
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $titre;
    /**
     * @ORM\Column(type="text", length=255)
     */
    #[ORM\Column(type: 'text')]
    private $description;
    /**
     * @ORM\Column(type="string", length=255)
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $image;
    /**
     * @ORM\Column(type="boolean", length=255)
     */
    #[ORM\Column(type: 'boolean')]
    private $animaux;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[ORM\Column(type: 'integer', nullable: true)]
    private $animauxPrix;
    /**
     * @ORM\Column(type="integer")
     */
    #[ORM\Column(type: 'integer')]
    private $tarifHauteSaison;
    /**
     * @ORM\Column(type="integer")
     */
    #[ORM\Column(type: 'integer')]
    private $tarifBasseSaison;
    /**
     * @ORM\Column(type="string", length=255)
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $emplacement;
    /**
     * @ORM\Column(type="integer")
     */
    #[ORM\Column(type: 'integer')]
    private $surface;
    /**
     * @ORM\Column(type="integer")
     */
    #[ORM\Column(type: 'integer')]
    private $nombreDeCouchages;
    /**
     * @ORM\Column(type="integer")
     */
    #[ORM\Column(type: 'integer')]
    private $nombreDeChambres;

    /**
     * @ORM\OneToMany(targetEntity=CalendrierDeDisponibilite::class, mappedBy="giteId", orphanRemoval=true)
     */
    private $calendrierDeDisponibilites;

    /**
     * @ORM\OneToMany(targetEntity=GiteOptionPrix::class, mappedBy="idGite", orphanRemoval=true)
     */
    private $giteOptionPrixes;

    /**
     * @ORM\ManyToOne(targetEntity=Contact::class, inversedBy="gites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contactId;

    public function __construct()
    {
        $this->calendrierDeDisponibilites = new ArrayCollection();
        $this->giteOptionPrixes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getAnimaux(): ?bool
    {
        return $this->animaux;
    }

    public function setAnimaux(bool $animaux): self
    {
        $this->animaux = $animaux;

        return $this;
    }

    public function getAnimauxPrix(): ?int
    {
        return $this->animauxPrix;
    }

    public function setAnimauxPrix(?int $animauxPrix): self
    {
        $this->animauxPrix = $animauxPrix;

        return $this;
    }

    public function getTarifHauteSaison(): ?int
    {
        return $this->tarifHauteSaison;
    }

    public function setTarifHauteSaison(int $tarifHauteSaison): self
    {
        $this->tarifHauteSaison = $tarifHauteSaison;

        return $this;
    }

    public function getTarifBasseSaison(): ?int
    {
        return $this->tarifBasseSaison;
    }

    public function setTarifBasseSaison(int $tarifBasseSaison): self
    {
        $this->tarifBasseSaison = $tarifBasseSaison;

        return $this;
    }

    public function getEmplacement(): ?string
    {
        return $this->emplacement;
    }

    public function setEmplacement(string $emplacement): self
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getNombreDeCouchages(): ?int
    {
        return $this->nombreDeCouchages;
    }

    public function setNombreDeCouchages(int $nombreDeCouchages): self
    {
        $this->nombreDeCouchages = $nombreDeCouchages;

        return $this;
    }

    public function getNombreDeChambres(): ?int
    {
        return $this->nombreDeChambres;
    }

    public function setNombreDeChambres(int $nombreDeChambres): self
    {
        $this->nombreDeChambres = $nombreDeChambres;

        return $this;
    }

    /**
     * @return Collection<int, CalendrierDeDisponibilite>
     */
    public function getCalendrierDeDisponibilites(): Collection
    {
        return $this->calendrierDeDisponibilites;
    }

    public function addCalendrierDeDisponibilite(CalendrierDeDisponibilite $calendrierDeDisponibilite): self
    {
        if (!$this->calendrierDeDisponibilites->contains($calendrierDeDisponibilite)) {
            $this->calendrierDeDisponibilites[] = $calendrierDeDisponibilite;
            $calendrierDeDisponibilite->setGiteId($this);
        }

        return $this;
    }

    public function removeCalendrierDeDisponibilite(CalendrierDeDisponibilite $calendrierDeDisponibilite): self
    {
        if ($this->calendrierDeDisponibilites->removeElement($calendrierDeDisponibilite)) {
            // set the owning side to null (unless already changed)
            if ($calendrierDeDisponibilite->getGiteId() === $this) {
                $calendrierDeDisponibilite->setGiteId(null);
            }
        }

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
            $giteOptionPrix->setIdGite($this);
        }

        return $this;
    }

    public function removeGiteOptionPrix(GiteOptionPrix $giteOptionPrix): self
    {
        if ($this->giteOptionPrixes->removeElement($giteOptionPrix)) {
            // set the owning side to null (unless already changed)
            if ($giteOptionPrix->getIdGite() === $this) {
                $giteOptionPrix->setIdGite(null);
            }
        }

        return $this;
    }

    public function  getContactId(): ?Contact
    {
            return $this->contactId;

    }

    public function setContactId(?Contact $contactId): self
    {
        $this->contactId = $contactId;

        return $this;
    }
}