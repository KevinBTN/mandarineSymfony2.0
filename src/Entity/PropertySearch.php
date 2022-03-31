<?php
namespace App\Entity;

class PropertySearch
{
    private $emplacement;
    private $nbchambremin;
    private $minPrice;
    private $maxPrice;

    public function getEmplacement(): ?string
    {
        return $this->emplacement;
    }

    public function setEmplacement(string $emplacement): self
    {
        $this->emplacement = $emplacement;
        return $this;
    }

    public function getNbchambremin(): ?string
    {
        return $this->nbchambremin;
    }

    public function setNbchambremin(string $nbchambremin): self
    {
        $this->nbchambremin = $nbchambremin;
        return $this;
    }

    public function getminPrice(): ?int
    {
        return $this->minPrice;
    }

    public function setminPrice(int $minPrice): self
    {
        $this->minPrice = $minPrice;
        return $this;
    }

    public function getmaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    public function setmaxPrice(int $maxPrice): self
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

}
