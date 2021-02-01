<?php
    require "GBD.inc.php";
    $fecha_hora=$_POST['fechacita']." ".$_POST['hora'];
    $servicio = $_POST['servicios'];
    $observaciones=$_POST['observaciones'];
    print_r($fecha_hora,$observaciones,$servicio);
    session_start();
    
    if($_SESSION['usuario']==null)
    {
        header("Location:../vista/login.php");
    }
    else
    {
        $usuarioSesion=$_SESSION['usuario'];
       
        grabarCitaBD($fecha_hora,$observaciones,$usuarioSesion,$servicio);
        header("Location:../vista/agenda.php");
    }
?>