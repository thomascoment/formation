<?php

/**
 * Représente un utilisateur du système
 */

namespace App\Model\Entity;

class User extends AbstractEntity
{


    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_USER = 'ROLE_USER';

    
    private ?string $mail = null;

    private ?string $password = null;

    /**
     * Token de l'utilisateur pour la réinitialisation du mot de passe
     * @var 
     */
    private ?string $token = null;

    private ?bool $is_admin = false;


    /**
     * Retourne le mail de l'utilisateur
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * Modifie le mail de l'utilisateur
     * @param mixed $mail
     * @return User
     */
    public function setMail(string $mail): self
    {
        $this->mail = $mail; 
        return $this;
    }


    /**
     * Retourne le mot de passe de l'utilisateur
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Modifie le mot de passe de l'utilisateur
     * @param mixed $password
     * @return User
     */
    public function setPassword(string $password): self
    {
        $this->password = $password; 
        return $this;
    }


    /**
     * Retourne le mot de passe de l'utilisateur
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * Modifie le mot de passe de l'utilisateur
     * @param mixed $token
     * @return User
     */
    public function setToken(?string $token): self
    {
        $this->token = $token; 
        return $this;
    }


    /**
     * Retourne les droits de l'utilisateur
     * @return bool|null
     */
    public function getIsAdmin(): ?bool
    {
        return $this->is_admin;
    }

    /**
     * Modifie les droits de l'utilisateur
     * @param mixed $is_admin
     * @return User
     */
    public function setIsAdmin(bool $is_admin): self
    {
        $this->is_admin = $is_admin;
        return $this;
    }

}