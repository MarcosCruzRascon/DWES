<?php
require "GBD.inc.php";

$usuario = $_POST['usuario'];
$password = $_POST['contrasenia'];

if (comprobarLogin($usuario, $password) == true) {
    session_start();
    $_SESSION['usuario'] = $usuario;
    header("Location:../vista/agenda.php");
} else {
    header("Location:../vista/registrar.php");
}
