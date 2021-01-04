<?php

class Annonce
{

    private $idAnn;
    private $datePubAnn;
    private $typeAnn;
    private $titreAnn;
    private $descAnn;
    private $numContAnn;
    private $numAdressAnn;
    private $rueAnn;
    private $codePost;
    private $idUti;

    //cosntructeur par défaut

    public function __toString(): string
    {
        return "[Id annonce] : " . $this->idAnn .
            "[Type d'annonce] : " . $this->typeAnn .
            "[Titre d'annonce] : " . $this->titreAnn .
            "[Description d'annonce] : " . $this->descAnn .
            "[Numéro de contact] : " . $this->numContAnn .
            "[Numéro d'adresse] : " . $this->numAdressAnn .
            "[Rue] : " . $this->rueAnn .
            "[Code postal] : " . $this->codePost .
            "[Id tilisateur] : " . $this->idUti;
    }

    /**
     * Get the value of idAnn
     */
    public function getIdAnn(): int
    {
        return $this->idAnn;
    }

    /**
     * Get the value of typeAnn
     */
    public function getTypeAnn(): string
    {
        return $this->typeAnn;
    }

    /**
     * Set the value of typeAnn
     *
     * @return  self
     */
    public function setTypeAnn(string $typeAnn): self
    {
        $this->typeAnn = $typeAnn;

        return $this;
    }

    /**
     * Get the value of titreAnn
     */
    public function getTitreAnn(): string
    {
        return $this->titreAnn;
    }

    /**
     * Set the value of titreAnn
     *
     * @return  self
     */
    public function setTitreAnn(string $titreAnn): self
    {
        $this->titreAnn = $titreAnn;

        return $this;
    }

    /**
     * Get the value of descAnn
     */
    public function getDescAnn(): string
    {
        return $this->descAnn;
    }

    /**
     * Set the value of descAnn
     *
     * @return  self
     */
    public function setDescAnn(string $descAnn): self
    {
        $this->descAnn = $descAnn;

        return $this;
    }

    /**
     * Get the value of numContAnn
     */
    public function getNumContAnn(): int
    {
        return $this->numContAnn;
    }

    /**
     * Set the value of numContAnn
     *
     * @return  self
     */
    public function setNumContAnn(int $numContAnn): self
    {
        $this->numContAnn = $numContAnn;

        return $this;
    }

    /**
     * Get the value of numAdressAnn
     */
    public function getNumAdressAnn(): int
    {
        return $this->numAdressAnn;
    }

    /**
     * Set the value of numAdressAnn
     *
     * @return  self
     */
    public function setNumAdressAnn(int $numAdressAnn): self
    {
        $this->numAdressAnn = $numAdressAnn;

        return $this;
    }

    /**
     * Get the value of rueAnn
     */
    public function getRueAnn(): string
    {
        return $this->rueAnn;
    }

    /**
     * Set the value of rueAnn
     *
     * @return  self
     */
    public function setRueAnn(string $rueAnn): self
    {
        $this->rueAnn = $rueAnn;

        return $this;
    }

    /**
     * Get the value of codePost
     */
    public function getCodePost(): int
    {
        return $this->codePost;
    }

    /**
     * Set the value of codePost
     *
     * @return  self
     */
    public function setCodePost(int $codePost): self
    {
        $this->codePost = $codePost;

        return $this;
    }

    /**
     * Get the value of idUti
     */
    public function getIdUti(): int
    {
        return $this->idUti;
    }

    /**
     * Set the value of idUti
     *
     * @return  self
     */
    public function setIdUti(int $idUti): self
    {
        $this->idUti = $idUti;

        return $this;
    }

    /**
     * Set the value of idAnn
     *
     * @return  self
     */
    public function setIdAnn($idAnn)
    {
        $this->idAnn = $idAnn;

        return $this;
    }

    /**
     * Get the value of datePubAnn
     */
    public function getDatePubAnn()
    {
        return $this->datePubAnn;
    }

    /**
     * Set the value of datePubAnn
     *
     * @return  self
     */
    public function setDatePubAnn($datePubAnn)
    {
        $this->datePubAnn = $datePubAnn;

        return $this;
    }
}
