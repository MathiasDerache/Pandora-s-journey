<?php

class SujetTheme
{

    private $idSujetTh;
    private $typeSujetTh;
    private $titreSujet;
    private $idUti;

    //constructeur par défaut



    /**
     * Get the value of idSujetTh
     */
    public function getIdSujetTh()
    {
        return $this->idSujetTh;
    }

    /**
     * Set the value of idSujetTh
     *
     * @return  self
     */
    public function setIdSujetTh($idSujetTh)
    {
        $this->idSujetTh = $idSujetTh;

        return $this;
    }

    /**
     * Get the value of typeSujetTh
     */
    public function getTypeSujetTh()
    {
        return $this->typeSujetTh;
    }

    /**
     * Set the value of typeSujetTh
     *
     * @return  self
     */
    public function setTypeSujetTh($typeSujetTh)
    {
        $this->typeSujetTh = $typeSujetTh;

        return $this;
    }

    /**
     * Get the value of titreSujet
     */
    public function getTitreSujet()
    {
        return $this->titreSujet;
    }

    /**
     * Set the value of titreSujet
     *
     * @return  self
     */
    public function setTitreSujet($titreSujet)
    {
        $this->titreSujet = $titreSujet;

        return $this;
    }

    /**
     * Get the value of idUti
     */
    public function getIdUti()
    {
        return $this->idUti;
    }

    /**
     * Set the value of idUti
     *
     * @return  self
     */
    public function setIdUti($idUti)
    {
        $this->idUti = $idUti;

        return $this;
    }
}
