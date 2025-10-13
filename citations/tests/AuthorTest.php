<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Model\Entity\Author;

/**
 * Classe de test pour l'entité Author
 */
class AuthorTest extends TestCase
{
    /**
     * Test du setter et getter du nom
     */
    public function testName()
    {
        $author = new Author();
        $author->setName("Albert Einstein");

        $this->assertEquals("Albert Einstein", $author->getName());
    }

    /**
     * Test du setter et getter de l'image
     */
    public function testImage()
    {
        $author = new Author();
        $author->setImage("einstein.jpg");

        $this->assertEquals("einstein.jpg", $author->getImage());
    }

    /**
     * Test du setter et getter de la biographie
     */
    public function testBiography()
    {
        $author = new Author();
        $author->setBiography("Physicien théoricien");

        $this->assertEquals("Physicien théoricien", $author->getBiography());
    }

    /**
     * Test de l'hydratation avec un tableau
     */
    public function testHydrate()
    {
        $data = [
            "id" => 1,
            "name" => "Oscar Wilde",
            "image" => "wilde.jpg",
            "biography" => "Écrivain et poète"
        ];

        $author = new Author();
        $author->hydrate($data);

        $this->assertEquals(1, $author->getId());
        $this->assertEquals("Oscar Wilde", $author->getName());
        $this->assertEquals("wilde.jpg", $author->getImage());
        $this->assertEquals("Écrivain et poète", $author->getBiography());
    }

    /**
     * Test que setId ne peut pas être appelé deux fois
     */
    public function testSetIdThrowsExceptionIfAlreadySet()
    {
        $this->expectException(\LogicException::class);

        $author = new Author();
        $author->setId(1);
        $author->setId(2); // Doit lancer une exception
    }
}
