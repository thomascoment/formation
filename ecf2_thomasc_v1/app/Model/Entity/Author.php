<?php

declare(strict_types=1);

namespace App\Model\Entity;

/**
 * La classe autheur
 */
class Author extends AbstractEntity
{
    /**
     * La variable autheur
     * @var
     */
    protected ?string $author = null;

    /**
     * La variable biography
     * @var
     */
    protected ?string $biography = null;

    /**
     * La variable image
     * @var
     */
    protected ?string $image = null;


    /**
     * Retourne un autheur
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * Modifie un autheur
     * @param mixed $author Nouveau nom de l'auteur
     * @throws \InvalidArgumentException Exception envoyé si la variable $author est vide
     * @return Author
     */
    public function setAuthor(?string $author): self
    {
        if ($author === null) {
            throw new \InvalidArgumentException("L'auteur est vide");
        }
        $this->author = $author;
        return $this;
    }


    /**
     * Retourne la biographie d'un auteur
     * @return string|null
     */
    public function getBiography(): ?string
    {
        return $this->biography;
    }

    /**
     * Modifie la biographie d'un auteur
     * @param mixed $biography Nouvelle biographie
     * @throws \InvalidArgumentException Exception envoyé si la variable $biography est vide
     * @return Author
     */
    public function setBiography(?string $biography): self
    {
        if ($biography === null) {
            throw new \InvalidArgumentException('La biographie est vide');
        }
        $this->biography = $biography;
        return $this;
    }


    /**
     * Retourne l'image d'un auteur
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Modifie l'image' d'un auteur
     * @param mixed $image Nouvelle image
     * @throws \InvalidArgumentException Exception envoyé si la variable $image est vide
     * @return Author
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

}
