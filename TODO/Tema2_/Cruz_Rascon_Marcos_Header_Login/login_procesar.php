<?php

    require "baseDatos.inc.php";

    $usuario = $_POST['usuario'];
    $password = $_POST['passwd'];

    if(comprobarUsuario($usuario, $password) == true )
    {
        header("Location:bienvenido.php?user=".$usuario);
    }
    else
    {
        //header("Location:login.php?redirigido");
        echo "Datos no correctos";
    }
?>