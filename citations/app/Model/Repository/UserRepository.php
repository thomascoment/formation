<?php

declare(strict_types=1);

namespace App\Model\Repository;
class UserRepository extends AbstractRepository
{
    protected string $table = 'user';
    protected string $entity = 'User';


    /**
     * Retourne le mot de passe hashé de l'utilisateur à partir de son mail
     * @param string $mail
     * @return void
     */
    public function getHashedPassword(string $mail): string
    {
        $sql = 'SELECT password FROM user WHERE mail = :mail';
        $q = $this->statement($sql, ['mail' => $mail]);
        $mail = $q->fetchColumn();
        return $mail ?: '';
    }


    /**
     * Retourne les informations de l'utilisateur grâce au mail
     * @return array|null
     * @param string $mail
     */
    public function getUserByMail(string $mail): ?array
    {
        $sql = 'SELECT * FROM user WHERE mail = :mail';
        $q = $this->statement($sql,['mail' => $mail]);
        $user = $q->fetch();
        return $user ?: null;
    }
}
