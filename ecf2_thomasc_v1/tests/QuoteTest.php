<?php

use PHPUnit\Framework\TestCase;
use App\Model\Entity\Quote;

/**
 * Classe qui permet de tester la classe Quote
 */
class QuoteTest extends TestCase
{
    /**
     * Fonction qui permet de tester si le getId() et setId() fonctionnent
     * @return void
     */
    function testAuthorRetourneIdetQuote(): void
    {
        $quote = new Quote();
        $quote->setId(4);
        $quote->setQuote('Il fait beau');

        $this->assertSame(4, $quote->getId());
        $this->assertSame('Il fait beau', $quote->getQuote());
    }

    /**
     * Fonction qui permet de tester que l'id soit bien lecture seul
     * @return void
     */
    function testIdEnLectureSeul(): void
    {
        $quote = new Quote();
        $quote->setId(2);

        $this->expectException((LogicException::class));

        $quote->setId(3);
    }

    /**
     * Fonction qui permet de tester la fonction hydrate, avec un attribut connu : "quote" et inconnu : "oeuvre"
     * @return void
     */
    function testHydrateAvecAttributInconnu(): void
    {
        $quote = new Quote();

        $quote->hydrate(['quote' => 'Il fait beau']);

        $this->assertSame('Il fait beau', $quote->getQuote());
        $this->expectException(InvalidArgumentException::class);
        $quote->hydrate(['oeuvre' => 'Truc']);
    }


    //////////////////////////// Tests Explanation \\\\\\\\\\\\\\\\\\\\\\\\\\

    function testexplanationRetourneIdetQuote(): void
    {
        $quote = new Quote();
        $quote->setId(4);
        $quote->setExplanation('L\'explication de la citation');

        $this->assertSame(4, $quote->getId());
        $this->assertSame('L\'explication de la citation', $quote->getExplanation());
    }

    /**
     * Fonction qui permet de tester la fonction hydrate, avec un attribut connu : "image" et inconnu : "oeuvre"
     * @return never
     */
    function testHydrateImageAvecAttributInconnu(): void
    {
        $quote = new Quote();

        $quote->hydrate(['explanation' => 'Nouvelle explication']);

        $this->assertSame('Nouvelle explication', $quote->getExplanation());
        $this->expectException(InvalidArgumentException::class);
        $quote->hydrate(['oeuvre' => 'Truc']);
    }
}