<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Model\Entity\Quote;

/**
 * Classe de test pour l'entité Quote
 */
class QuoteTest extends TestCase
{
    /**
     * Test du setter et getter de la citation
     */
    public function testQuote()
    {
        $quote = new Quote();
        $quote->setQuote("La vie est belle.");

        $this->assertEquals("La vie est belle.", $quote->getQuote());
    }

    /**
     * Test du setter et getter de l'explication
     */
    public function testExplanation()
    {
        $quote = new Quote();
        $quote->setExplanation("Citation positive");

        $this->assertEquals("Citation positive", $quote->getExplanation());
    }

    /**
     * Test du setter et getter de l'identifiant auteur
     */
    public function testAuthorId()
    {
        $quote = new Quote();
        $quote->setAuthor_id(2);

        $this->assertEquals(2, $quote->getAuthor_id());
    }

    /**
     * Test de l'hydratation avec un tableau
     */
    public function testHydrate()
    {
        $data = [
            "id" => 1,
            "quote" => "Un jour sans rire est un jour perdu.",
            "explanation" => "Importance du sourire",
            "author_id" => null
        ];

        $quote = new Quote();
        $quote->hydrate($data);

        $this->assertEquals(1, $quote->getId());
        $this->assertEquals("Un jour sans rire est un jour perdu.", $quote->getQuote());
        $this->assertEquals("Importance du sourire", $quote->getExplanation());
        $this->assertNull($quote->getAuthor_id());
    }

    /**
     * Test que setId ne peut pas être appelé deux fois
     */
    public function testSetIdThrowsExceptionIfAlreadySet()
    {
        $this->expectException(\LogicException::class);

        $quote = new Quote();
        $quote->setId(1);
        $quote->setId(2); // Doit lancer une exception
    }
}
