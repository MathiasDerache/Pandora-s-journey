<?php

class Billet {

    private $numeroBillet;
    private $dateEmbarquement;

    //constructeur par défaut

    public function __toString() : string {
        return "[Numéro de billet] : " .$this->numeroBillet.
                "[Date d'embarquement] : " .$this->dateEmbarquement;
    }

    /**
     * Get the value of numeroBillet
     */ 
    public function getNumeroBillet() : int
    {
        return $this->numeroBillet;
    }

    /**
     * Get the value of dateEmbarquement
     */ 
    public function getDateEmbarquement() : DateTime
    {
        return $this->dateEmbarquement;
    }

    /**
     * Set the value of dateEmbarquement
     *
     * @return  self
     */ 
    public function setDateEmbarquement(DateTime $dateEmbarquement) : self
    {
        $this->dateEmbarquement = $dateEmbarquement;

        return $this;
    }
}

?>