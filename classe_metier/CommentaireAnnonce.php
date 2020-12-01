<?php

class CommentaireAnnonce {

    private $idComm;
    private $contComm;
    private $dateMessAnn;
    private $idUti;
    private $idAnn;


    //constructeur par défaut

    public function __toString() : string {
        return "[Id du commentaire] : " .$this->idComm.
                "[Contenu du commentaire] : " .$this->contComm.
                "[Date du commentaire] : " .$this->dateMessAnn.
                "[Id tilisateur] : " .$this->idUti.
                "[Id annonce] : " .$this->idAnn;
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

    /**
     * Get the value of idAnn
     */ 
    public function getIdAnn() : int
    {
        return $this->idAnn;
    }

    /**
     * Set the value of idAnn
     *
     * @return  self
     */ 
    public function setIdAnn(int $idAnn) : self
    {
        $this->idAnn = $idAnn;

        return $this;
    }

    /**
     * Set the value of idComm
     *
     * @return  self
     */ 
    public function setIdComm($idComm)
    {
        $this->idComm = $idComm;

        return $this;
    }
}
