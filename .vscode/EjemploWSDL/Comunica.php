<?php

class Comunica
{
    /**
     * @param string $nombre
     * @return string $result
     */
    public function saluda(string $nombre)
    {
        return "Hola ".$nombre;
    }

/**
 * @param string $nombre
 * @return string $result
 */
    public function despide(string $nombre) 
    {
        return "Adios ".$nombre;
    }
}