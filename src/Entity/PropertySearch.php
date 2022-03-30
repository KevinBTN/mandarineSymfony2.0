<?php
namespace App\Entity;

class PropertySearch
{
    private $emplacement;

    public function getEmplacement(): ?string
    {
        return $this->emplacement;
    }

    public function setEmplacement(string $emplacement): self
    {
        $this->emplacement = $emplacement;
        return $this;
    }

}
