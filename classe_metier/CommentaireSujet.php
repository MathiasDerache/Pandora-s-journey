<?php

class CommentaireSujet {

    private $idCommSuj;
    private $pseudoUt;
    private $dateCommSuj;
    private $contCommSuj;

    //constructeur par défaut


    public function __toString() : string {
        return "[Id commenaire sujet] : " .$this->idCommSuj.
                "[Pseudo utilisateur] : " .$this->pseudoUt.
                "[Date commentaire sujet] : " .$this->dateCommSuj.
                "[Contenu commentaire sujet] : " .$this->contCommSuj;
    }

    /**
     * Get the value of idCommSuj
     */ 
    public function getIdCommSuj() : int
    {
        return $this->idCommSuj;
    }

    /**
     * Get the value of pseudoUt
     */ 
    public function getPseudoUt() : string
    {
        return $this->pseudoUt;
    }

    /**
     * Set the value of pseudoUt
     *
     * @return  self
     */ 
    public function setPseudoUt(string $pseudoUt) : self
    {
        $this->pseudoUt = $pseudoUt;

        return $this;
    }

    /**
     * Get the value of dateCommSuj
     */ 
    public function getDateCommSuj() : DateTime
    {
        return $this->dateCommSuj;
    }

    /**
     * Set the value of dateCommSuj
     *
     * @return  self
     */ 
    public function setDateCommSuj(DateTime $dateCommSuj) : self
    {
        $this->dateCommSuj = $dateCommSuj;

        return $this;
    }

    /**
     * Get the value of contCommSuj
     */ 
    public function getContCommSuj() : string
    {
        return $this->contCommSuj;
    }

    /**
     * Set the value of contCommSuj
     *
     * @return  self
     */ 
    public function setContCommSuj(string $contCommSuj) :self
    {
        $this->contCommSuj = $contCommSuj;

        return $this;
    }
}

?>