<?php
include_once 'gbd.php';
include_once 'funciones.inc.php';
include_once '../modelo/examen.php';
include_once '../modelo/usuario.php';
session_start();
date_default_timezone_set('Europe/Madrid');
$codigo = $_SESSION['codExamen'];
$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['respuestas']))
{
    $tamanio = count(obtieneExamen($codigo));
        $respuestas="";
        for ($i = 1; $i <= $tamanio; $i++) {
            $respuestas.= (empty($_POST[$i])) ? " " : $_POST[$i];
        }
        $_SESSION['respuestas']=$respuestas;
}

$tamanio = count(obtieneExamen($codigo));
$respuesta = "";
$examen = new examen;
$examen->setCodExamen($codigo);
$arrayRespuestas = respuestasCorrectas($_SESSION['codExamen']);
$respuestasCorrectas = "";
foreach ($arrayRespuestas as $key => $valor) {
    $respuestasCorrectas .= $valor->respuestaCorrecta;
}

if (!isset($_GET["re"])) {

    $respuesta=$_SESSION['respuestas'];

    $fecha = new DateTime();
    $examen->setFechaInicio($_SESSION['horaInicio']);
    $examen->setFechaFin($fecha->format('Y-m-d H:i:s'));
    $usuario = $_SESSION['usuario'];
    guardaExamen($examen, $usuario, $respuesta);
} else {
    
    $examen = new examen;
    $examen->setCodExamen($codigo);
    $respuesta = obtieneRespuestas($usuario, $examen);
}

$correctas = "";
for ($i = 0; $i < $tamanio; $i++) {
    if ($respuesta[$i] == $respuestasCorrectas[$i]) {
        $correctas++;
    }
}

// respuestas totales numero $tamanio
//respuestas acertadas numero $correctas
if ($correctas != 0) {
    $numeroCorrectas = $correctas;
    $numeroFallos = $tamanio - $correctas;
    $nota = ($correctas * 10) / $tamanio;

    $_SESSION['aciertos'] = $numeroCorrectas;
    $_SESSION['fallos'] = $numeroFallos;
    $_SESSION['nota'] = $nota;
} else {
    $_SESSION['aciertos'] = 0;
    $_SESSION['fallos'] = $tamanio;
    $_SESSION['nota'] = 0;
}

header("Location:../vista/finalizar.php");
