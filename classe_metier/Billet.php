<?php

class Billet {

    private $numBillet;
    private $dateEmb;
    private $idUti;

    //constructeur par défaut

    public function __toString() : string {
        return "[Numéro de billet] : " .$this->numBillet.
                "[Date d'embarquement] : " .$this->dateEmb.
                "[Id tilisateur] : " .$this->idUti;
    }

    /**
     * Get the value of numBillet
     */ 
    public function getNumBillet() : ?int
    {
        return $this->numBillet;
    }

    /**
     * Set the value of dateEmb
     *
     * @return  self
     */ 
    public function setNumBillet(?int $numBillet) : self
    {
        $this->numBillet = $numBillet;

        return $this;
    }

    /**
     * Get the value of dateEmb
     */ 
    public function getDateEmb() : DateTime
    {
        return $this->dateEmb;
    }

    /**
     * Set the value of dateEmb
     *
     * @return  self
     */ 
    public function setDateEmb(DateTime $dateEmb) : self
    {
        $this->dateEmb = $dateEmb;

        return $this;
    }

    /**
     * Get the value of idUti
     */ 
    public function getIdUti() : int
    {
        return $this->idUti;
    }

    /**
     * Set the value of idUti
     *
     * @return  self
     */ 
    public function setIdUti(int $idUti) : self
    {
        $this->idUti = $idUti;

        return $this;
    }
}

?>