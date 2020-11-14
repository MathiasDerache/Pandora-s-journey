<?php

class Annonces {

    private $idAnnonce;
    private $typeAnnonce;
    private $titreAnnonce;
    private $descriptionAnnonce;
    private $numContact;
    private $numAdresse;
    private $rue;
    private $codePostal;

    //cosntructeur par défaut

    public function __toString() : string {
        return "[Id annonce] : " .$this->idAnnonce.
                "[Type d'annonce] : " .$this->typeAnnonce.
                "[Titre d'annonce] : " .$this->titreAnnonce.
                "[Description d'annonce] : " .$this->descriptionAnnonce.
                "[Numéro de contact] : " .$this->numContact.
                "[Numéro d'adresse] : " .$this->numAdresse.
                "[Rue] : " .$this->rue.
                "[Code postal] : " .$this->codePostal;
    }

    /**
     * Get the value of idAnnonce
     */ 
    public function getIdAnnonce() : int
    {
        return $this->idAnnonce;
    }

    /**
     * Get the value of typeAnnonce
     */ 
    public function getTypeAnnonce() : string
    {
        return $this->typeAnnonce;
    }

    /**
     * Set the value of typeAnnonce
     *
     * @return  self
     */ 
    public function setTypeAnnonce(string $typeAnnonce) : self
    {
        $this->typeAnnonce = $typeAnnonce;

        return $this;
    }

    /**
     * Get the value of titreAnnonce
     */ 
    public function getTitreAnnonce() : string
    {
        return $this->titreAnnonce;
    }

    /**
     * Set the value of titreAnnonce
     *
     * @return  self
     */ 
    public function setTitreAnnonce(string $titreAnnonce) : self
    {
        $this->titreAnnonce = $titreAnnonce;

        return $this;
    }

    /**
     * Get the value of descriptionAnnonce
     */ 
    public function getDescriptionAnnonce() : string
    {
        return $this->descriptionAnnonce;
    }

    /**
     * Set the value of descriptionAnnonce
     *
     * @return  self
     */ 
    public function setDescriptionAnnonce(string $descriptionAnnonce) : self
    {
        $this->descriptionAnnonce = $descriptionAnnonce;

        return $this;
    }

    /**
     * Get the value of numContact
     */ 
    public function getNumContact() : int
    {
        return $this->numContact;
    }

    /**
     * Set the value of numContact
     *
     * @return  self
     */ 
    public function setNumContact(int $numContact) : self
    {
        $this->numContact = $numContact;

        return $this;
    }

    /**
     * Get the value of numAdresse
     */ 
    public function getNumAdresse() : int
    {
        return $this->numAdresse;
    }

    /**
     * Set the value of numAdresse
     *
     * @return  self
     */ 
    public function setNumAdresse(int $numAdresse) : self
    {
        $this->numAdresse = $numAdresse;

        return $this;
    }

    /**
     * Get the value of rue
     */ 
    public function getRue() : string
    {
        return $this->rue;
    }

    /**
     * Set the value of rue
     *
     * @return  self
     */ 
    public function setRue(string $rue) : self
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get the value of codePostal
     */ 
    public function getCodePostal() : int
    {
        return $this->codePostal;
    }

    /**
     * Set the value of codePostal
     *
     * @return  self
     */ 
    public function setCodePostal(int $codePostal) :self
    {
        $this->codePostal = $codePostal;

        return $this;
    }
}

?>