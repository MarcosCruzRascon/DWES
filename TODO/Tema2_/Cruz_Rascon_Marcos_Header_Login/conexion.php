<?php

/**
 * Metodo que realiza una conexion a la base de datos de tienda
 * @return Object Funcion que devuelve una conexion a la base de datos tienda
 */
function connectDB()
{
    $server = "127.0.0.1";
    $user = "dwes";
    $pass = "abc123.";
    $bd = "tienda";

    $conexion = new mysqli($server, $user, $pass,$bd) 
        or die("Ha sucedido un error inexperado en la conexion de la base de datos");

    return $conexion;
} 

/**
 * Metodo que realiza una desconexion a la base de datos de tienda
 * 
 * @param Object $conexion Parametro que le paseremos al metodo para desconectarnos
 * @return Object Funcion que devuelve una desconexion a la base de datos tienda
 */
function disconnectDB($conexion)
{
    $close = mysqli_close($conexion) 
        or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

    return $close;
}

