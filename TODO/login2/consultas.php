<?php
function comprobarUsuario($userBuscar, $passwdBuscar)
{
    require "conexion.php";

    $conexion=connectDB();

    $consulta = $conexion->stmt_init();

    $sql='SELECT * from usuario where usuario=?;';

    $consulta->prepare($sql);

    $consulta->bind_param('s',$userBuscar);

    $consulta->execute();

    $resultado=$consulta->get_result();

    $objeto=$resultado->fetch_object();

    $user=$objeto->usuario;
    $passwd=$objeto->contrasenia;

    $existeUsuario = false;
    if($user === $userBuscar && $passwd === $passwdBuscar)
    {
        $existeUsuario=true;
    }
    
    return $existeUsuario;
}
?>