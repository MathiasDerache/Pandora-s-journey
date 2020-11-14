<?php

class Profil {

    private $idProfil;
    private $typeProfil;

    //constructeur par défaut

    public function __toString() : string {
        return "[Id Profil] : " .$this->idProfil.
                "[Type de profil] : " .$this->typeProfil;
    }


    /**
     * Get the value of idProfil
     */ 
    public function getIdProfil() : int
    {
        return $this->idProfil;
    }

    /**
     * Get the value of typeProfil
     */ 
    public function getTypeProfil() : string
    {
        return $this->typeProfil;
    }

    /**
     * Set the value of typeProfil
     *
     * @return  self
     */ 
    public function setTypeProfil(string $typeProfil) : self
    {
        $this->typeProfil = $typeProfil;

        return $this;
    }
}

?>