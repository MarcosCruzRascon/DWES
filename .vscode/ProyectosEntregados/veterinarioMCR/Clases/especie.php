<?php

class Especie{
    private $idespecie;
    private $nombre;
    private $chip;

    /**
     * Get the value of idespecie
     */ 
    public function getIdespecie()
    {
        return $this->idespecie;
    }

    /**
     * Set the value of idespecie
     *
     * @return  self
     */ 
    public function setIdespecie($idespecie)
    {
        $this->idespecie = $idespecie;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of chip
     */ 
    public function getChip()
    {
        return $this->chip;
    }

    /**
     * Set the value of chip
     *
     * @return  self
     */ 
    public function setChip($chip)
    {
        $this->chip = $chip;

        return $this;
    }
}