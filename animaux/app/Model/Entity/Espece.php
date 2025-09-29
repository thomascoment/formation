<?php
namespace App\Model\Entity;

use InvalidArgumentException;
use function PHPUnit\Framework\throwException;

/**
 * Represente la table Espece
 */
class Espece extends AbstractEntity{
    

    /**
     * Le nom de l'espèce
     * @var 
     */
    private ?string $espece = null;


/**
     * Hydrate un objet
     * @param array $data
     * @return Espece
     */
    /*
    public function hydrate(array $data): self
    {
        foreach($data as $key => $value){
            $method = 'set' . ucfirst($key);
            if(method_exists(__CLASS__, $method)){
                $this->$method($value);
            } else {
                echo 'La méthode ' . $method . " n'existe pas.";
            }
        }
        return $this;
    }
        */








    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(?string $espece): self
    {
        $this->espece = $espece;
        return $this;
    }
}