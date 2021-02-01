<?php
class Vacunas
{
    private $idVacuna;
    private $nombre;

    /**
     * Get the value of idVacuna
     */ 
    public function getIdVacuna()
    {
        return $this->idVacuna;
    }

    /**
     * Set the value of idVacuna
     *
     * @return  self
     */ 
    public function setIdVacuna($idVacuna)
    {
        $this->idVacuna = $idVacuna;

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
}