<?php

class CommentaireAnnonce {

    private $idComm;
    private $contComm;
    private $dateMessAnn;

    //constructeur par défaut

    public function __toString() : string {
        return "[Id du commentaire] : " .$this->idComm.
                "[Contenu du commentaire] : " .$this->contComm.
                "[Date du commentaire] : " .$this->dateMessAnn;
        }

    /**
     * Get the value of idComm
     */ 
    public function getIdComm() : int
    {
        return $this->idComm;
    }

    /**
     * Get the value of contComm
     */ 
    public function getContComm() : string
    {
        return $this->contComm;
    }

    /**
     * Set the value of contenuCommentaire
     *
     * @return  self
     */ 
    public function setContComm(string $contComm) : self
    {
        $this->contComm = $contComm;

        return $this;
    }

    /**
     * Get the value of dateMessAnn
     */ 
    public function getDateMessAnn() : DateTime
    {
        return $this->dateMessAnn;
    }

    /**
     * Set the value of dateMessAnn
     *
     * @return  self
     */ 
    public function setDateMessAnn(DateTime $dateMessAnn) : self
    {
        $this->dateMessAnn = $dateMessAnn;

        return $this;
    }
}
?>