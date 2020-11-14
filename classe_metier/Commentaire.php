<?php

class Commentaire {

    private $idCommentaire;
    private $contenuCommentaire;
    private $dateCommentaire;

    //constructeur par défaut

    public function __toString() : string {
        return "[Id du commentaire] : " .$this->idCommentaire.
                "[Contenu du commentaire] : " .$this->contenuCommentaire.
                "[Date du commentaire] : " .$this->dateCommentaire;
        }

    /**
     * Get the value of idCommentaire
     */ 
    public function getIdCommentaire() : int
    {
        return $this->idCommentaire;
    }

    /**
     * Get the value of contenuCommentaire
     */ 
    public function getContenuCommentaire() : string
    {
        return $this->contenuCommentaire;
    }

    /**
     * Set the value of contenuCommentaire
     *
     * @return  self
     */ 
    public function setContenuCommentaire(string $contenuCommentaire) : self
    {
        $this->contenuCommentaire = $contenuCommentaire;

        return $this;
    }

    /**
     * Get the value of dateCommentaire
     */ 
    public function getDateCommentaire() : DateTime
    {
        return $this->dateCommentaire;
    }

    /**
     * Set the value of dateCommentaire
     *
     * @return  self
     */ 
    public function setDateCommentaire(DateTime $dateCommentaire) : self
    {
        $this->dateCommentaire = $dateCommentaire;

        return $this;
    }
}
?>