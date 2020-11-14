<?php

class ThemeForum{

    private $idTheme;
    private $typeTh;

    //constructeur par défaut


    public function __toString() : string {
        return "[Id thème forum] : " .$this->idTheme.
                "[Type thème forum] : " .$this->typeTh;
    }

    /**
     * Get the value of idTheme
     */ 
    public function getIdTheme() : int
    {
        return $this->idTheme;
    }

    /**
     * Get the value of typeTh
     */ 
    public function getTypeTh() : string
    {
        return $this->typeTh;
    }

    /**
     * Set the value of typeTh
     *
     * @return  self
     */ 
    public function setTypeTh(string $typeTh) : self
    {
        $this->typeTh = $typeTh;

        return $this;
    }
}

?>