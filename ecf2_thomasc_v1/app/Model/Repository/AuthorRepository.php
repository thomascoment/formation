<?php

declare(strict_types=1);

namespace App\Model\Repository;

/**
 * Classe AbstracRepository
 */
class AuthorRepository extends AbstractRepository
{
    protected string $table = 'author';

    protected string $entity = 'Author';
}
