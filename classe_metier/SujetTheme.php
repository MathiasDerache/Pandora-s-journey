<?php

class SujetTheme {

    private $idSuje;
    private $intSujet;

    //constructeur par défaut

    public function __toString() : string {
        return "[Id sujet] : " .$this->idSuje.
                "[Intitulé du sujet] : " .$this->intSujet;
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
}

?>