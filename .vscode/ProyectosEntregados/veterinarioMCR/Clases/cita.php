<?php
class Cita
{
    private $idCita;
    private $fechaCita;
    private $motivos;
    private $duracion;
    private $cliente_idusuario;
    private $realizada;

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
     * Get the value of fechaCita
     */ 
    public function getFechaCita()
    {
        return $this->fechaCita;
    }

    /**
     * Set the value of fechaCita
     *
     * @return  self
     */ 
    public function setFechaCita($fechaCita)
    {
        $this->fechaCita = $fechaCita;

        return $this;
    }

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
     * Get the value of duracion
     */ 
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set the value of duracion
     *
     * @return  self
     */ 
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get the value of realizada
     */ 
    public function getRealizada()
    {
        return $this->realizada;
    }

    /**
     * Set the value of realizada
     *
     * @return  self
     */ 
    public function setRealizada($realizada)
    {
        $this->realizada = $realizada;

        return $this;
    }

    /**
     * Get the value of cliente_idusuario
     */ 
    public function getCliente_idusuario()
    {
        return $this->cliente_idusuario;
    }

    /**
     * Set the value of cliente_idusuario
     *
     * @return  self
     */ 
    public function setCliente_idusuario($cliente_idusuario)
    {
        $this->cliente_idusuario = $cliente_idusuario;

        return $this;
    }
}