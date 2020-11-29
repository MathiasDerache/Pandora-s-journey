<?php

class SujetTheme {

    private $idSuje;
    private $intSujet;
    private $idUti;

    //constructeur par défaut

    public function __toString() : string {
        return "[Id sujet] : " .$this->idSuje.
                "[Intitulé du sujet] : " .$this->intSujet.
                "[Id Utilisateur] : " .$this->idUti;
    }


    /**
     * Get the value of idSuje
     */ 
    public function getIdSujetForum() : int
    {
        return $this->idSuje;
    }

    /**
     * Get the value of intSujet
     */ 
    public function getIntSujet() : string
    {
        return $this->intSujet;
    }

    /**
     * Set the value of intSujet
     *
     * @return  self
     */ 
    public function setIntSujet(string $intSujet) : self
    {
        $this->intSujet = $intSujet;

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