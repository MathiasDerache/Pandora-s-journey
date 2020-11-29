<?php

class Utilisateur {

    private $idUti;
    private $nom;
    private $prenom;
    private $pseudo;
    private $email;
    private $numTel;
    private $password;
    private $profil;

    // constructeur par défaut

    public function __toString() : string {
        return "[Id Utilisateur] : " .$this->idUti.
                "[Nom] : " .$this->nom.
                "[Prenom] : " .$this->prenom.
                "[Pseudo] : " .$this->pseudo.
                "[Email] : " .$this->email.
                "[Numéro téléphone] : " .$this->numTel.
                "[Password] : " .$this->password.
                "[Profil] : " .$this->profil;
    }

    

    /**
     * Get the value of idUti
     */ 
    public function getIdUti() : int
    {
        return $this->idUti;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom() : string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom(string $nom) : self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom() : string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom(string $prenom) : self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo() : string
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo(string $pseudo) : self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail(string $email) :self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of numTel
     */ 
    public function getNumTel() : int
    {
        return $this->numTel;
    }

    /**
     * Set the value of numTel
     *
     * @return  self
     */ 
    public function setNumTel(int $numTel) : self
    {
        $this->numTel = $numTel;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword(string $password) : self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of profil
     */ 
    public function getProfil() : string
    {
        return $this->profil;
    }

    /**
     * Set the value of profil
     *
     * @return  self
     */ 
    public function setProfil(string $profil) :self
    {
        $this->profil = $profil;

        return $this;
    }
}

?>