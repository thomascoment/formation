<?php

declare(strict_types=1);

namespace App\Model\Repository;

use PDO;

/**
 * Classe abstraite Repository
 */
abstract class AbstractRepository
{
    /**
     * Variable $pdo de type PDO
     * @var PDO
     */
    protected PDO $pdo;

    /**
     * Variable $table
     * @var string
     */
    protected string $table;

    protected string $entity;

    /**
     * Initialise le pdo dans abstactRepository
     * @param \PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * Retourne la liste de tous les auteurs
     * @throws \Exception
     * @return object[]
     */
    public function findAll(): array
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $q = $this->pdo->query($sql);
        $data = $q->fetchAll();

        $entities = [];

        foreach ($data as $row) {
            $fqcn = 'App\Model\Entity\\' . $this->entity;
            if (class_exists($fqcn)) {
                $entity = new $fqcn();
                $entity->hydrate($row);
                $entities[] = $entity;
            } else {
                throw new \Exception('La classe demandé n\'existe pas');
            }
        }
        return $entities;
    }

    /**
     * Permet d'afficher 1 auteur en fonction de son ID
     * @param int $id
     * @return object|null
     */
    public function findOne(int $id): object|null
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id=:id';
        $q = $this->pdo->prepare($sql);
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();
        $data = $q->fetch();

        if ($data) {
            $fqcn = 'App\Model\Entity\\' . $this->entity;
            if (class_exists($fqcn)) {
                $entity = new $fqcn();
                $entity->hydrate($data);
            }
            return $entity;
        } else {
            return null;
        }
    }

    /**
     * Permet de supprimer la ligne de la table voulu à l'id voulu
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $q = $this->pdo->prepare($sql);
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        return $q->execute();
    }

}
