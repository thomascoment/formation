<?php

use Phpunit\Framework\TestCase;
use App\Model\Entity\Animal;

class AnimalTest extends TestCase
{
    function testAnimalRetourneIdEtAnimal(): void
    {
        $animal = new Animal();
        $animal->setId(2);
        $animal->setNom('boubou');

        $this->assertSame(2, $animal->getId());
        $this->assertSame('boubou', $animal->getNom());
    }

    function testIdEnLectureSeule(): void
    {
        $animal = new Animal();
        $animal->setId(2);

        $this->expectException(LogicException::class);

        $animal->setId(3); //on essaye de modifier l'id
    }

    function testHydrateAvecAttributIinconnu(): void
    {
        $animal = new Animal();

        $animal->hydrate(['nom' => 'boubou']);

        $this->assertSame('boubou', $animal->getNom());

        $this->expectException(InvalidArgumentException::class);
        $animal->hydrate(['cri' => 'bonjour']);
    }
}