<?php
    require "GBD.inc.php";
    
    $usuario = $_POST['usuario'];
    $password = $_POST['contrasenia'];
    $ape1=$_POST['apellido1'];
    $ape2=$_POST['apellido2'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];

    if(grabarUsuarioBD($usuario, $password,$ape1,$ape2,$correo,$telefono,2) == true )
    {
        header("Location:../vista/index.php");
    }
    else
    {
        header("Location:../vista/registrar.php");
    }
?>