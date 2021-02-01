<?php

require_once "conexion.php";
require_once "../modelo/examen.php";
require_once "../modelo/pregunta.php";
include_once "../modelo/usuario.php";

function comprobarLogin($usuario)
{
    try {
        $conexion = connectDB();
        $user = $usuario->getIdusuario();
        $passwd = $usuario->getPassword();
        $sql = 'SELECT * FROM usuarios WHERE idusuarios = ? AND passwd = ?;';
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $user);
        $consulta->bindParam(2, $passwd);
        $consulta->execute();

        $fila = $consulta->fetch();
        $existe = "";

        if ($fila != null) {
            $existe = true;
        }
        else
        {
            $existe = false;
        }
    } catch (PDOException $error) {
        die("Error: " . $error->getMessage());
    }

    return $existe;
}

function infoExamen($codExamen)
{
    try {
        $conexion = connectDB();
        $sql = "SELECT * FROM examenes where codExamen=?;";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $codExamen);
        $consulta->execute();
        $examenDevuelto = "";
        $fila = $consulta->fetchObject();
        if ($fila != null) {
            $examenDevuelto = new examen;
            $examenDevuelto->setCodExamen($fila->codExamen);
            $examenDevuelto->setFechaFin($fila->fechaFin);
            $examenDevuelto->setFechaInicio($fila->fechaInicio);
        }
    } catch (PDOException $error) {
        die("Error: " . $error->getMessage());
    }
}

function obtieneExamen($codExamen)
{
    try {
        $conexion = connectDB();
        $sql = "SELECT * FROM examenes_tiene_preguntas as l inner join preguntas as f on l.preguntas_idpreguntas=f.idpreguntas where examenes_codExamen= '" . $codExamen . "'order by posicion;";
        $consulta = $conexion->query($sql);

        if ($consulta != null) {
            $examen = $consulta->fetchAll(PDO::FETCH_CLASS);
        }
    } catch (PDOException $error) {
        die("Error: " . $error->getMessage());
    }
    return $examen;
}

function examenExiste($codExamen)
{
    try {
        $conexion = connectDB();
        $sql = 'SELECT * FROM examenes where codExamen = ?;';
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $codExamen);
        $consulta->execute();

        $fila = $consulta->fetch();
        $existe = false;

        if ($fila != null) {
            $existe = true;
        }
    } catch (PDOException $error) {
        die("Error: " . $error->getMessage());
    };
    print_r($fila);

    return $existe;
}

function respuestasCorrectas($codExamen)
{
    try {
        $conexion = connectDB();
        $sql = "SELECT respuestaCorrecta FROM examenes_tiene_preguntas as a inner join preguntas as b 
        on a.preguntas_idpreguntas = b.idpreguntas where a.examenes_codExamen=? order by posicion;";
         $consulta = $conexion->prepare($sql);
         $consulta->bindParam(1, $codExamen);
         $consulta->execute();
        $respuestas = "";
        if ($consulta != null) {
            $respuestas = $consulta->fetchAll(PDO::FETCH_CLASS);
        }
    } catch (PDOException $error) {
        die("Error: " . $error->getMessage());
    }
    return $respuestas;
}

function obtieneUsuario($usuario)
{
    try {
        $conexion = connectDB();
        $sql = "SELECT * FROM usuarios where idusuarios=?;";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $usuario);
        $consulta->execute();
        $usuarioDevuelto = "";
        $fila = $consulta->fetchObject();
        if ($fila != null) {
            $usuarioDevuelto = new usuario;
            $usuarioDevuelto->setIdusuario($fila->idusuarios);
            $usuarioDevuelto->setNombre($fila->nombre);
            $usuarioDevuelto->setApellido1($fila->apellido1);
            $usuarioDevuelto->setApellido2($fila->apellido2);
            $usuarioDevuelto->setCorreo($fila->correo);
            $usuarioDevuelto->setPassword($fila->passwd);
            $usuarioDevuelto->setDireccionFoto("/");
        }
    } catch (PDOException $error) {
        die("Error: " . $error->getMessage());
    }

    return $usuarioDevuelto;
}

function guardaExamen($examen, $usuario, $respuestasUsuario)
{
    $idusuario = $usuario->getIdusuario();
    $codExamen = $examen->getCodExamen();
    $inicio = $examen->getFechaInicio();
    $fin = $examen->getFechaFin();
    $respuestas = $respuestasUsuario;

    try {
        $conexion = connectDB();
        $sql = "INSERT INTO `usuarios_hace_examenes` (`usuarios_idusuarios`, `examenes_codExamen`, `fechahora_inicioUsuario`, `fechahora_finUsuario`, `respuestas`) VALUES (?, ?, ?, ?, ?);";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $idusuario);
        $consulta->bindParam(2, $codExamen);
        $consulta->bindParam(3, $inicio);
        $consulta->bindParam(4, $fin);
        $consulta->bindParam(5, $respuestas);
        $consulta->execute();

    } catch (PDOException $error) {
        die("Error: " . $error->getMessage());
    }
}

function examenRealizado($usuario, $examen){

    $idusuario = $usuario->getIdusuario();
    $codExamen = $examen->getCodExamen();
    try {
        $conexion = connectDB();
        $sql = "SELECT * FROM usuarios_hace_examenes where usuarios_idusuarios = ? and examenes_codExamen= ?;";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $idusuario);
        $consulta->bindParam(2, $codExamen);
        $consulta->execute();
        $fila = $consulta->fetchObject();

        $resultado = $fila!=null ? true :false;
    } catch (PDOException $error) {
        die("Error: " . $error->getMessage());
    }

    return $resultado; 
}

function obtieneRespuestas($usuario, $examen){

    $idusuario = $usuario->getIdusuario();
    $codExamen = $examen->getCodExamen();
    try {
        $conexion = connectDB();
        $sql = "SELECT * FROM usuarios_hace_examenes where usuarios_idusuarios = ? and examenes_codExamen= ?;";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $idusuario);
        $consulta->bindParam(2, $codExamen);
        $consulta->execute();
        $fila = $consulta->fetchObject();

        $respuestas = $fila->respuestas;
        

    } catch (PDOException $error) {
        die("Error: " . $error->getMessage());
    }

    return $respuestas; 
}

function obtieneInfoExamenUsuario($usuario, $examen){

    $idusuario = $usuario->getIdusuario();
    $codExamen = $examen->getCodExamen();
    try {
        $conexion = connectDB();
        $sql = "SELECT * FROM usuarios_hace_examenes where usuarios_idusuarios = ? and examenes_codExamen= ?;";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $idusuario);
        $consulta->bindParam(2, $codExamen);
        $consulta->execute();
        $fila = $consulta->fetchObject();

        $examen = new examen;
        $examen->setCodExamen($fila->examenes_codExamen);
        $examen->setFechaInicio($fila->fechahora_inicioUsuario);
        $examen->setFechaFin($fila->fechahora_finUsuario);
        

    } catch (PDOException $error) {
        die("Error: " . $error->getMessage());
    }

    return $examen; 
}

function obtieneInfoExamen($examen){

    $codExamen = $examen->getCodExamen();
    try {
        $conexion = connectDB();
        $sql = "SELECT * FROM examenes where codExamen= ?;";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $codExamen);
        $consulta->execute();
        $fila = $consulta->fetchObject();

        $examen = new examen;
        $fechaIncio = new Datetime($fila->fechaInicio);
        $fechaFin = new Datetime($fila->fechaFin);
        $duracion = new Datetime($fila->duracion);
        $examen->setCodExamen($fila->codExamen);
        $examen->setFechaInicio($fechaIncio);
        $examen->setFechaFin($fechaFin);
        $examen->setDuracion($duracion);
        

    } catch (PDOException $error) {
        die("Error: " . $error->getMessage());
    }

    return $examen; 
}


