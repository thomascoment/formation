<?php

declare(strict_types=1);

namespace App\Model\Entity;

class Quote extends AbstractEntity
{
    private ?string $quote = null;

    private ?string $explanation = null;


    public function getQuote(): ?string
    {
        return $this->quote;
    }

    public function setQuote(?string $quote): self
    {
        if ($quote === null) {
            throw new \InvalidArgumentException('La citationest vide est vide');
        }
        $this->quote = $quote;
        return $this;
    }


    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    public function setExplanation(?string $explanation): self
    {
        if ($explanation === null) {
            throw new \InvalidArgumentException('La citationest vide est vide');
        }
        $this->explanation = $explanation;
        return $this;
    }
}
