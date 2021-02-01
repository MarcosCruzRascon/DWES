<?php
class Sesion
{
    public static function iniciar()
    {
        session_start();
    }

    public static function leer(string $clave)
    {
        if (isset($_SESSION[$clave]))
        {
            return $_SESSION[$clave];
        }
        
    }

    public static function existe(string $clave)
    {
        $var = $_SESSION[$clave];
        $existe=false;
        isset($var) ? $existe=true : $existe=false;
        
        return $existe;
    }

    public static function escribir($clave,$valor)
    {
        $_SESSION[$clave] = $valor;
    }

    public static function eliminar($clave)
    {
        if(Sesion::existe($clave))
        {
            unset($_SESSION[$clave]);
        }
        
    }
}