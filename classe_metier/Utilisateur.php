<?php

class Utilisateur {

    private $idUtilisateur;
    private $nom;
    private $prenom;
    private $pseudo;
    private $email;
    private $numeroTel;
    private $password;

    // constructeur par défaut

    public function __toString() : string {
        return "[Id Utilisateur] : " .$this->idUtilisateur.
                "[Nom] : " .$this->nom.
                "[Prenom] : " .$this->prenom.
                "[Pseudo] : " .$this->pseudo.
                "[Email] : " .$this->email.
                "[Numéro téléphone] : " .$this->numeroTel.
                "[Password] : " .$this->password;
    }

    

    /**
     * Get the value of idUtilisateur
     */ 
    public function getIdUtilisateur() : int
    {
        return $this->idUtilisateur;
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
     * Get the value of numeroTel
     */ 
    public function getNumeroTel() : int
    {
        return $this->numeroTel;
    }

    /**
     * Set the value of numeroTel
     *
     * @return  self
     */ 
    public function setNumeroTel(int $numeroTel) : self
    {
        $this->numeroTel = $numeroTel;

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
}

?>