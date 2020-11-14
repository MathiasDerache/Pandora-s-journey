<?php

class SujetForum {

    private $idSujetForum;
    private $typeSujetForum;

    //constructeur par défaut

    public function __toString() : string {
        return "[Id sujet forum] : " .$this->idSujetForum.
                "[Type sujet forum] : " .$this->typeSujetForum;
    }


    /**
     * Get the value of idSujetForum
     */ 
    public function getIdSujetForum() : int
    {
        return $this->idSujetForum;
    }

    /**
     * Get the value of typeSujetForum
     */ 
    public function getTypeSujetForum() : string
    {
        return $this->typeSujetForum;
    }

    /**
     * Set the value of typeSujetForum
     *
     * @return  self
     */ 
    public function setTypeSujetForum(string $typeSujetForum) : self
    {
        $this->typeSujetForum = $typeSujetForum;

        return $this;
    }
}

?>