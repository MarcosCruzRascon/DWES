<?php

function connectDB()
{
    $server = "127.0.0.1";
    $user = "dwes";
    $pasw = "abc123.";
    $database = "tienda";

    $conexion =new mysqli($server, $user, $pasw, $database)
        or die("Ha ocurrido un error inesperado en la conexion a la base de datos");

    return $conexion;
}

function disconect($conexion)
{
    $close = mysqli_close($conexion)
    or die("Ha ocurrido un error inexperado en la desconexion de la base de datos");

    return $close;
}
