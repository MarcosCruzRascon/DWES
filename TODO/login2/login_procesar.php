<?php
    include 'consultas.php';
    $usuario=$_POST['usuario'];
    $passwd=$_POST['clave'];
    if(comprobarUsuario($usuario,$passwd))
    {
        header("Location:bienvenido.php?user=".$usuario);
    }
    else
    {
       echo 'mal';
    }
?>