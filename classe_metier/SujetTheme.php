<?php

class SujetTheme
{

    private $idSujetTh;
    private $typeSujetTh;
    private $questionSujet;
    private $dateAjout;
    private $idUti;

    //constructeur par défaut



    /**
     * Get the value of idSujetTh
     */
    public function getIdSujetTh(): ?string
    {
        return $this->idSujetTh;
    }

    /**
     * Set the value of idSujetTh
     *
     * @return  self
     */
    public function setIdSujetTh(?string $idSujetTh)
    {
        $this->idSujetTh = $idSujetTh;

        return $this;
    }

    /**
     * Get the value of typeSujetTh
     */
    public function getTypeSujetTh(): ?string
    {
        return $this->typeSujetTh;
    }

    /**
     * Set the value of typeSujetTh
     *
     * @return  self
     */
    public function setTypeSujetTh(?string $typeSujetTh): ?self
    {
        $this->typeSujetTh = $typeSujetTh;

        return $this;
    }

    /**
     * Get the value of titreSujet
     */
    public function getQuestionSujet(): ?string
    {
        return $this->questionSujet;
    }

    /**
     * Set the value of questionSujet
     *
     * @return  self
     */
    public function setQuestionSujet(?string $questionSujet): self
    {
        $this->questionSujet = $questionSujet;

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
    public function setIdUti(?int $idUti): ?self
    {
        $this->idUti = $idUti;

        return $this;
    }

    /**
     * Get the value of dateAjout
     */
    public function getDateAjout(): ?DateTime

    {
        return $this->dateAjout;
    }

    /**
     * Set the value of dateAjout
     *
     * @return  self
     */
    public function setDateAjout(DateTime $dateAjout): ?self
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }
}
