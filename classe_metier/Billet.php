<?php

class Billet {

    private $numBillet;
    private $dateEmb;

    //constructeur par défaut

    public function __toString() : string {
        return "[Numéro de billet] : " .$this->numBillet.
                "[Date d'embarquement] : " .$this->dateEmb;
    }

    /**
     * Get the value of numBillet
     */ 
    public function getNumBillet() : int
    {
        return $this->numBillet;
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
}

?>