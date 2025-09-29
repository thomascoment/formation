<?php

namespace App\Model\Entity;

use InvalidArgumentException;
use function PHPUnit\Framework\throwException;

class Animal extends AbstractEntity{

    protected ?string $nom = null;

    private ?int  $espece_id = null;

    public function getEspece_Id(): ?string
    {
        return $this->espece_id;
    }

    public function setEspece_Id(?string $espece_id = null): self
    {
        $this->espece_id = $espece_id;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }
}

