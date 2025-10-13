<?php

declare(strict_types=1);

namespace App\Model\Entity;

use DateTime;

/**
 * Classe abstraite représentant une entité de base
 */
abstract class AbstractEntity
{
    /**
     * La clé primaire de la table Espece
     * @var
     */
    private ?int $id = null;

    private ?DateTime $createdAt = null;
    private ?DateTime $updatedAt = null;


    /**
     * Hydrate un objet de type Espece
     * @param array $data un tableau assiociatif
     * @return self
     */
    public function hydrate(array $data): self
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                throw new \InvalidArgumentException('La propriété ' . $key . ' n\'existe pas');
            }
        }

        return $this;
    }


    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }



    public function getUpatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }



    /**
     * Retourne l'id de l'espèce
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * Modifie l'id de l'espèce
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        if ($this->id !== null) {
            throw new \LogicException("L'id est en lecture seule");
        }
        $this->id = $id;
        return $this;
    }
}
