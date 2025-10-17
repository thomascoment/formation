<?php

declare(strict_types=1);

namespace App\Model\Entity;

/**
 * Entité représentant un auteur
 */
class Author extends AbstractEntity
{
    /**
     * Nom de l'auteur
     */
    private string $author;

    /**
     * Image de l'auteur (optionnelle)
     */
    private ?string $image = null;

    /**
     * Biographie de l'auteur (optionnelle)
     */
    private ?string $biography = null;


    /**
     * Retourne le nom de l'auteur
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Définit le nom de l'auteur
     * @param string $author
     * @return self
     */
    public function setAuthor(?string $author): self
    {
        $this->author = $author;
        return $this;
    }

    /**
     * Retourne l'image de l'auteur
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Définit l'image de l'auteur
     * @param string|null $image
     * @return self
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Retourne la biographie de l'auteur
     * @return string|null
     */
    public function getBiography(): ?string
    {
        return $this->biography;
    }

    /**
     * Définit la biographie de l'auteur
     * @param string|null $biography
     * @return self
     */
    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;
        return $this;
    }
}
