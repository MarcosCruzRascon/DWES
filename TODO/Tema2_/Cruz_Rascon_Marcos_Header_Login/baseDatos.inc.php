<?php

function comprobarUsuario($usuarioBuscar, $passwordBuscar)
    {
        require "conexion.php";

        $conexion = connectDB();
 
        $sql = 'SELECT * FROM usuarios WHERE usuario = ?;';

        $conexion->prepare($sql);
        $conexion->bind_param('s', $usuarioBuscar);

        $conexion->execute();

        $resultado = $conexion->get_result();


        $acceso = $resultado->fetch_object();


        $user = $acceso -> usuario;
        $passwd = $acceso -> contrasenia;

        $existeUser = false;

        if($user === $usuarioBuscar && $passwd ===  $passwordBuscar)
        {
            $existeUser = true;
        }

        return $existeUser;        
    }
