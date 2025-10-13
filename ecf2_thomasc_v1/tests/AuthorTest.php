<?php

use PHPUnit\Framework\TestCase;
use App\Model\Entity\Author;

/**
 * La classe qui permet de tester la classe Author
 */
class AuthorTest extends TestCase
{

    ///////////////////////// Tests Author \\\\\\\\\\\\\\\\\\\\\\\\\\\\
    /**
     * Fonction qui permet de tester si le getId() et setId() fonctionnent
     * @return void
     */
    function testAuthorRetourneIdetAuthor(): void
    {
        $author = new Author();
        $author->setId(4);
        $author->setAuthor('Patrick');

        $this->assertSame(4, $author->getId());
        $this->assertSame('Patrick', $author->getAuthor());
    }

    /**
     * Fonction qui permet de tester que l'id soit bien lecture seul
     * @return void
     */
    function testIdEnLectureSeul(): void
    {
        $author = new Author();
        $author->setId(2);

        $this->expectException((LogicException::class));

        $author->setId(3);
    }

    /**
     * Fonction qui permet de tester la fonction hydrate, avec un attribut connu : "author" et inconnu : "oeuvre"
     * @return void
     */
    function testHydrateAvecAttributInconnu(): void
    {
        $author = new Author();

        $author->hydrate(['author' => 'Paul']);

        $this->assertSame('Paul', $author->getAuthor());
        $this->expectException(InvalidArgumentException::class);
        $author->hydrate(['oeuvre' => 'Truc']);
    }


    ////////////////////////////// Test $biography \\\\\\\\\\\\\\\\\\\\\\\\\

    /**
     * Fonction qui permet de tester si le getId() et setId() fonctionnent
     * @return void
     */
    function testBiographyRetourneIdetAuthor(): void
    {
        $author = new Author();
        $author->setId(4);
        $author->setBiography('La vie d\'un gars');

        $this->assertSame(4, $author->getId());
        $this->assertSame('La vie d\'un gars', $author->getBiography());
    }

    /**
     * Fonction qui permet de tester la fonction hydrate, avec un attribut connu : "biography" et inconnu : "oeuvre"
     * @return never
     */
    function testHydrateBiographyAvecAttributInconnu(): void
    {
        $author = new Author();

        $author->hydrate(['biography' => 'La vie d\'un gars']);

        $this->assertSame('La vie d\'un gars', $author->getBiography());
        $this->expectException(InvalidArgumentException::class);
        $author->hydrate(['oeuvre' => 'Truc']);
    }


    /////////////////////////// Test image \\\\\\\\\\\\\\\\\\\\\\\\\\\\

    /**
     * Fonction qui permet de tester si le getId() et setId() fonctionnent
     * @return void
     */
    function testImageRetourneIdetAuthor(): void
    {
        $author = new Author();
        $author->setId(4);
        $author->setImage('L\'image de l\'auteur');

        $this->assertSame(4, $author->getId());
        $this->assertSame('L\'image de l\'auteur', $author->getImage());
    }

    /**
     * Fonction qui permet de tester la fonction hydrate, avec un attribut connu : "image" et inconnu : "oeuvre"
     * @return never
     */
    function testHydrateImageAvecAttributInconnu(): void
    {
        $author = new Author();

        $author->hydrate(['image' => 'Nouvelle image']);

        $this->assertSame('Nouvelle image', $author->getImage());
        $this->expectException(InvalidArgumentException::class);
        $author->hydrate(['oeuvre' => 'Truc']);
    }

}