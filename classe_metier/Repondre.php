<?php

class Repondre{

    private $idComm;

    //constructeur par défaut

    public function __toString() : string {
        return "[Id du commentaire] : " .$this->idComm;
    }        


    /**
     * Get the value of idComm
     */ 
    public function getIdComm() : int
    {
        return $this->idComm;
    }

    /**
     * Set the value of idComm
     *
     * @return  self
     */ 
    public function setIdComm(int $idComm) : self
    {
        $this->idComm = $idComm;

        return $this;
    }
}