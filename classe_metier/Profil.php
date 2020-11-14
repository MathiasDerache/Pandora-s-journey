<?php

class Profil {

    private $idProf;
    private $typeProf;

    //constructeur par défaut

    public function __toString() : string {
        return "[Id Profil] : " .$this->idProf.
                "[Type de profil] : " .$this->typeProf;
    }


    /**
     * Get the value of idProf
     */ 
    public function getIdProf() : int
    {
        return $this->idProf;
    }

    /**
     * Get the value of typeProf
     */ 
    public function getTypeProf() : string
    {
        return $this->typeProf;
    }

    /**
     * Set the value of typeProf
     *
     * @return  self
     */ 
    public function setTypeProf(string $typeProf) : self
    {
        $this->typeProf = $typeProf;

        return $this;
    }
}

?>