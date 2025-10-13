<?php

declare(strict_types=1);

namespace App\Model\Entity;

use LogicException;

/**
 * La classe abstraite Entity
 * @var
 */
abstract class AbstractEntity
{
    /**
     * La clé primaire
     * @var
     */
    private ?int $id = null;


    public function hydrate(array $data): self
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                throw new \InvalidArgumentException('La propriété ' . $key . " n'existe pas");
            }
        }
        return $this;
    }


    /**
     * Retourne l'id de Author
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }



    /**
     * Modifie l'id de Author
     * @param mixed $id id de Author
     * @throws \LogicException
     * @return AbstractEntity
     */
    public function setId(?int $id): self
    {
        if ($this->id !== null) {
            throw new LogicException("L'id est en lecture seule");
        }
        $this->id = $id;
        return $this;

    }
}
