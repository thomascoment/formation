<?php

namespace App\Model\Entity; 

/**
 * Classe abstraite 
 */
abstract class AbstractEntity{
    /**
     * La clé primaire
     * @var 
     */
    private ?int $id = null;


    public function hydrate(array $data):self
    {
        foreach($data as $key => $value){
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            } else {
               throw new \InvalidArgumentException('La propriété ' . $key . " n'existe pas");
            }
        }
        return $this;
    }
    /**
     * Retourne l'id de l'espece
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

        public function setId(?int $id): self
    {
        if($this->id !== null){
            throw new \LogicException("L'id est en lecture seule");
        }
        $this->id = $id;
        return $this;
    }
}