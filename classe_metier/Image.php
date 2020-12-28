<?php
class Image
{
    private $id;
    private $NomFichier;
    private $TailleFichier;
    private $PathFile;
    private $TypeImage;
    private $IdUti;

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(int  $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of NomFichier
     */
    public function getNomFichier(): string
    {
        return $this->NomFichier;
    }

    /**
     * Set the value of NomFichier
     *
     * @return  self
     */
    public function setNomFichier(string  $NomFichier): self
    {
        $this->NomFichier = $NomFichier;

        return $this;
    }

    /**
     * Get the value of TailleFichier
     */
    public function getTailleFichier(): int
    {
        return $this->TailleFichier;
    }

    /**
     * Set the value of TailleFichier
     *
     * @return  self
     */
    public function setTailleFichier(int $TailleFichier): self
    {
        $this->TailleFichier = $TailleFichier;

        return $this;
    }

    /**
     * Get the value of PathFile
     */
    public function getPathFile(): string
    {
        return $this->PathFile;
    }

    /**
     * Set the value of PathFile
     *
     * @return  self
     */
    public function setPathFile(string $PathFile): self
    {
        $this->PathFile = $PathFile;

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
     * Get the value of TypeImage
     */
    public function getTypeImage(): string
    {
        return $this->TypeImage;
    }

    /**
     * Set the value of TypeImage
     *
     * @return  self
     */
    public function setTypeImage(string $TypeImage): self
    {
        $this->TypeImage = $TypeImage;

        return $this;
    }
}
