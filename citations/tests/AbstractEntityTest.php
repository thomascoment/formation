<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Model\Entity\AbstractEntity;

/**
 * Classe factice pour tester AbstractEntity
 */
class DummyEntity extends AbstractEntity
{
    private ?string $name = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }
}

/**
 * Classe de test pour AbstractEntity
 */
class AbstractEntityTest extends TestCase
{
    /**
     * Test que getId retourne null par défaut
     */
    public function testIdIsNullByDefault()
    {
        $entity = new DummyEntity();
        $this->assertNull($entity->getId());
    }

    /**
     * Test que setId définit correctement l'identifiant
     */
    public function testSetId()
    {
        $entity = new DummyEntity();
        $entity->setId(42);

        $this->assertEquals(42, $entity->getId());
    }

    /**
     * Test que setId ne peut pas être appelé deux fois
     */
    public function testSetIdThrowsExceptionIfAlreadySet()
    {
        $this->expectException(\LogicException::class);

        $entity = new DummyEntity();
        $entity->setId(1);
        $entity->setId(2); // Doit lancer une exception
    }

    /**
     * Test de l'hydratation avec un tableau valide
     */
    public function testHydrateWithValidData()
    {
        $data = [
            "id" => 10,
            "name" => "Test Entity"
        ];

        $entity = new DummyEntity();
        $entity->hydrate($data);

        $this->assertEquals(10, $entity->getId());
        $this->assertEquals("Test Entity", $entity->getName());
    }

    /**
     * Test que l'hydratation échoue si la propriété n'existe pas
     */
    public function testHydrateThrowsExceptionForInvalidProperty()
    {
        $this->expectException(\InvalidArgumentException::class);

        $data = [
            "id" => 1,
            "unknownProperty" => "value"
        ];

        $entity = new DummyEntity();
        $entity->hydrate($data);
    }
}
