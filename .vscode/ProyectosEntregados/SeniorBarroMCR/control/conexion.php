<?php
function connectDB()
{

    $conexion=new PDO("mysql:host=localhost;dbname=seniorbarromcr","barromcr","root")
        or die("Ha sucedido un error inexperado en la conexion de la base de datos");

    return $conexion;
} 

function disconnectDB($conexion)
{
    $conexion=null;
}

