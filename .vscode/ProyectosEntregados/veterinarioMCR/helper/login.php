<?php

class Login
{
    public static function Identifica(string $usuario,string $contrasena)
    {
        $conexion = new GBD("localhost", "veterinariomcr", "root", "");
        $array = [$usuario];
        $dato = $conexion->findById("cliente",$array);
        $valido=false;

        if($dato!=null)
        {
            if($dato[0]->getPassword()==$contrasena)
            {
                $valido=true;
            }
        }
        return $valido;
    }

    private static function ExisteUsuario(string $usuario,string $contrasena=null)
    {
        
    }

    public static function UsuarioEstaLogueado()
    {
        
    }
}