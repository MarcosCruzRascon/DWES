<?php

class Cartillavacunacion
{
    private $fechaVacunacion;
    private $observaciones;
    private $vacunas_idVacuna;
    private $mascota_numeroExpediente;

    /**
     * Get the value of fechaVacunacion
     */ 
    public function getFechaVacunacion()
    {
        return $this->fechaVacunacion;
    }

    /**
     * Set the value of fechaVacunacion
     *
     * @return  self
     */ 
    public function setFechaVacunacion($fechaVacunacion)
    {
        $this->fechaVacunacion = $fechaVacunacion;

        return $this;
    }

    /**
     * Get the value of observaciones
     */ 
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     *
     * @return  self
     */ 
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get the value of vacunas_idVacuna
     */ 
    public function getVacunas_idVacuna()
    {
        return $this->vacunas_idVacuna;
    }

    /**
     * Set the value of vacunas_idVacuna
     *
     * @return  self
     */ 
    public function setVacunas_idVacuna($vacunas_idVacuna)
    {
        $this->vacunas_idVacuna = $vacunas_idVacuna;

        return $this;
    }

    /**
     * Get the value of mascota_numeroExpediente
     */ 
    public function getMascota_numeroExpediente()
    {
        return $this->mascota_numeroExpediente;
    }

    /**
     * Set the value of mascota_numeroExpediente
     *
     * @return  self
     */ 
    public function setMascota_numeroExpediente($mascota_numeroExpediente)
    {
        $this->mascota_numeroExpediente = $mascota_numeroExpediente;

        return $this;
    }
}

