<?php
class Visita
{
    private $motivos;
    private $tratamiento;
    private $observaciones;
    private $idCita;
    private $numeroExpediente;
    private $fechaVisita;

    

    /**
     * Get the value of motivos
     */ 
    public function getMotivos()
    {
        return $this->motivos;
    }

    /**
     * Set the value of motivos
     *
     * @return  self
     */ 
    public function setMotivos($motivos)
    {
        $this->motivos = $motivos;

        return $this;
    }

    /**
     * Get the value of problemas
     */ 
    public function getProblemas()
    {
        return $this->problemas;
    }

    /**
     * Set the value of problemas
     *
     * @return  self
     */ 
    public function setProblemas($problemas)
    {
        $this->problemas = $problemas;

        return $this;
    }

    /**
     * Get the value of tratamiento
     */ 
    public function getTratamiento()
    {
        return $this->tratamiento;
    }

    /**
     * Set the value of tratamiento
     *
     * @return  self
     */ 
    public function setTratamiento($tratamiento)
    {
        $this->tratamiento = $tratamiento;

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
     * Get the value of idCita
     */ 
    public function getIdCita()
    {
        return $this->idCita;
    }

    /**
     * Set the value of idCita
     *
     * @return  self
     */ 
    public function setIdCita($idCita)
    {
        $this->idCita = $idCita;

        return $this;
    }

    /**
     * Get the value of numeroExpediente
     */ 
    public function getNumeroExpediente()
    {
        return $this->numeroExpediente;
    }

    /**
     * Set the value of numeroExpediente
     *
     * @return  self
     */ 
    public function setNumeroExpediente($numeroExpediente)
    {
        $this->numeroExpediente = $numeroExpediente;

        return $this;
    }

    /**
     * Get the value of fechaVisita
     */ 
    public function getFechaVisita()
    {
        return $this->fechaVisita;
    }

    /**
     * Set the value of fechaVisita
     *
     * @return  self
     */ 
    public function setFechaVisita($fechaVisita)
    {
        $this->fechaVisita = $fechaVisita;

        return $this;
    }
}