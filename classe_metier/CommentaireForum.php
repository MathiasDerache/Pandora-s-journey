<?php

class CommentaireForum {

    private $idCommSujet;
    private $pseudoUtilisateur;
    private $dateCommSujet;
    private $contenuCommSujet;

    //constructeur par défaut


    public function __toString() : string {
        return "[Id commenaire sujet] : " .$this->idCommSujet.
                "[Pseudo utilisateur] : " .$this->pseudoUtilisateur.
                "[Date commentaire sujet] : " .$this->dateCommSujet.
                "[Contenu commentaire sujet] : " .$this->contenuCommSujet;
    }

    /**
     * Get the value of idCommSujet
     */ 
    public function getIdCommSujet() : int
    {
        return $this->idCommSujet;
    }

    /**
     * Get the value of pseudoUtilisateur
     */ 
    public function getPseudoUtilisateur() : string
    {
        return $this->pseudoUtilisateur;
    }

    /**
     * Set the value of pseudoUtilisateur
     *
     * @return  self
     */ 
    public function setPseudoUtilisateur(string $pseudoUtilisateur) : self
    {
        $this->pseudoUtilisateur = $pseudoUtilisateur;

        return $this;
    }

    /**
     * Get the value of dateCommSujet
     */ 
    public function getDateCommSujet() : DateTime
    {
        return $this->dateCommSujet;
    }

    /**
     * Set the value of dateCommSujet
     *
     * @return  self
     */ 
    public function setDateCommSujet(DateTime $dateCommSujet) : self
    {
        $this->dateCommSujet = $dateCommSujet;

        return $this;
    }

    /**
     * Get the value of contenuCommSujet
     */ 
    public function getContenuCommSujet() : string
    {
        return $this->contenuCommSujet;
    }

    /**
     * Set the value of contenuCommSujet
     *
     * @return  self
     */ 
    public function setContenuCommSujet(string $contenuCommSujet) :self
    {
        $this->contenuCommSujet = $contenuCommSujet;

        return $this;
    }
}

?>