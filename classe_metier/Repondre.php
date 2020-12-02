<?php

class Repondre{

    private $idComm;
    private $idComm_commentaire;

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

    

    /**
     * Get the value of idComm_commentaire
     */ 
    public function getIdComm_commentaire() : int
    {
        return $this->idComm_commentaire;
    }

    /**
     * Set the value of idComm_commentaire
     *
     * @return  self
     */ 
    public function setIdComm_commentaire(int $idComm_commentaire) : self
    {
        $this->idComm_commentaire = $idComm_commentaire;

        return $this;
    }
}