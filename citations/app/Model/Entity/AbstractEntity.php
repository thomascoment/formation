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

    /**
     * Date de création de l'entité
     * @var 
     */
    private ?DateTime $createdAt = null;

    /**
     * Date de modification de l'entité
     * @var 
     */
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


    /**
     * Retourne la date de création de l'entité
     * @return DateTime|null
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }


    /**
     * Modifie la date de création de l'entité
     * @param mixed $createdAt date de création
     * @return AbstractEntity
     */
    public function setCreatedAt(?DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }



    /**
     * Retourne la date de création de l'entité
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     *  Modifie la date de mise à jour de l'entité
     * @param mixed $updatedAt date de mise à jour
     * @return AbstractEntity
     */
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
