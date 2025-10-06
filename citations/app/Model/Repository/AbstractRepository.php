<?php

declare(strict_types=1);

namespace App\Model\Repository;

use App\Model\Entity\AbstractEntity;
use PDO;
use PDOStatement;

abstract class AbstractRepository
{
    protected PDO $pdo;
    protected string $table;
    protected string $entity;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Prépare au beaoin et exécute une requête SQL avec des paramètres.
     * @param string $sql la requete SQL
     * @param array $params tableau associatif de paramètres à lier à la requête
     * @return bool|PDOStatement
     */
    protected function statement(string $sql, ?array $params = null): PDOStatement
    {
        if (is_null($params)) {
            $q = $this->pdo->query($sql);
        } else {
            $q = $this->pdo->prepare($sql);

            $q->execute($params);
        }
        return $q;
    }

    /**
     * Retourne la liste des especes
     *
     * @return array litse des entités d'une table
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
                $entity->hydrate($this->normalizeRow($row));
                $entities[] = $entity;
            } else {
                throw new \Exception('Probleme interne');
            }
        }
        return $entities;
    }


    /**
     * Retourner une entité d'une table depuis son id
     *
     * @param integer $id Clef primaire du tuple à retourner
     * @return object|null
     */
    public function find(int $id): object|null
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
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
     * Ajoute un enregistrement en base de données
     *
     * @param array $data les données sous forme d'un tableau associatif
     * @return object
     */
    public function create(array $data): AbstractEntity|false
    {
        $sql = 'INSERT INTO ' . $this->table . ' (';
        $sql .= implode(',', array_keys($data));
        $sql .= ') VALUES (';
        $sql .= ':' . implode(',:', array_keys($data));
        $sql .= ')';

        if ($this->statement($sql, $data)) {
            $id = (int) $this->pdo->lastInsertId();
            return $this->find($id);
        } else {
            return false;
        }
    }



    /**
     * Supprime le tuple d'un table
     *
     * @param integer $id Clef Primaire du tuple à supprimer
     * @return boolean
     */
    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id=:id';
        $q = $this->pdo->prepare($sql);
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        return $q->execute();
    }

    protected function normalizeRow(array $row): array
    {
        $newRow = [];
        foreach ($row as $key => $value) {
            $key = str_replace("_", " ", $key);
            $key = ucwords($key);
            $key = (str_replace(' ', '', $key));
            $key = lcfirst($key);
            $newRow[$key] = $value;


            if (str_ends_with($key, 'At') && $value !== null) {
                $date  = new \DateTime($value);
                $newRow[$key] = $date;
            }

            if (str_starts_with($key, 'is') || str_starts_with($key, 'has')) {
                $newRow[$key] = (bool)$value;
            }
        }


        return $newRow;
    }

}
