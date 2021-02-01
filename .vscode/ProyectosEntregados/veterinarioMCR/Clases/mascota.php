<?php
class Mascota
{
    private $numeroExpediente;
    private $nombre;
    private $fechaNacimiento;
    private $idespecie;
    private $cliente_idusuario;
    private $genero;

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
     * Get the value of fechaNacimiento
     */ 
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set the value of fechaNacimiento
     *
     * @return  self
     */ 
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }


    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

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
