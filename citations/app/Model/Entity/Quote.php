<?php

declare(strict_types=1);

namespace App\Model\Entity;

/**
 * Entité représentant une citation
 */
class Quote extends AbstractEntity
{
    /**
     * Texte de la citation
     */
    private string $quote;

    /**
     * Explication de la citation (optionnelle)
     */
    private ?string $explanation = null;

    /**
     * Identifiant de l'auteur associé (optionnel)
     */
    private ?Author $author = null;


    /**
     * Retourne le texte de la citation
     * @return string
     */
    public function getQuote(): string
    {
        return $this->quote;
    }

    /**
     * Définit le texte de la citation
     * @param string $quote
     * @return self
     */
    public function setQuote(string $quote): self
    {
        $this->quote = $quote;
        return $this;
    }

    /**
     * Retourne l'explication de la citation
     * @return string|null
     */
    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    /**
     * Définit l'explication de la citation
     * @param string|null $explanation
     * @return self
     */
    public function setExplanation(?string $explanation): self
    {
        $this->explanation = $explanation;
        return $this;
    }

    /**
     * Retourne l'identifiant de l'auteur associé
     * @return Author|null
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    /**
     * Définit l'identifiant de l'auteur associé
     * @param Author|null $author 
     * @return self
     */
    public function setAuthor(Author $author): self
    {
        $this->author = $author;
        return $this;
    }

    public function setAuthorId(int $author_id): self
    {
        if($author_id === '' || $author_id === '0' || $author_id === 0){
            $this->$author_id = null;
        } else {
            $this->$author_id = $author_id;  
        }
        return $this;
    }

}
