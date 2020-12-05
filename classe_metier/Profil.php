<?php

class Profil
{
    private $idProfil;
    private $typeProfil;

    /**
     * Get the value of idProfil
     */
    public function getIdProfil()
    {
        return $this->idProfil;
    }

    /**
     * Set the value of idProfil
     *
     * @return  self
     */
    public function setIdProfil($idProfil)
    {
        $this->idProfil = $idProfil;

        return $this;
    }

    /**
     * Get the value of typeProfil
     */
    public function getTypeProfil()
    {
        return $this->typeProfil;
    }

    /**
     * Set the value of typeProfil
     *
     * @return  self
     */
    public function setTypeProfil($typeProfil)
    {
        $this->typeProfil = $typeProfil;

        return $this;
    }
}
