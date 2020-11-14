<?php

class ThemeForum{

    private $idThemeForum;
    private $typeThemeForum;

    //constructeur par défaut


    public function __toString() : string {
        return "[Id thème forum] : " .$this->idThemeForum.
                "[Type thème forum] : " .$this->typeThemeForum;
    }

    /**
     * Get the value of idThemeForum
     */ 
    public function getIdThemeForum() : int
    {
        return $this->idThemeForum;
    }

    /**
     * Get the value of typeThemeForum
     */ 
    public function getTypeThemeForum() : string
    {
        return $this->typeThemeForum;
    }

    /**
     * Set the value of typeThemeForum
     *
     * @return  self
     */ 
    public function setTypeThemeForum(string $typeThemeForum) : self
    {
        $this->typeThemeForum = $typeThemeForum;

        return $this;
    }
}

?>