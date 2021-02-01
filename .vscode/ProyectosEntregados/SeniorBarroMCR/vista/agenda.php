<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<?php
include_once "../control/GBD.inc.php";
session_start();
if($_SESSION['usuario']!=null)
{
    $usuario = $_SESSION['usuario'];
    if($usuario=="seniorbarro@barro.com")
    {
        $agenda=listaCitasBarro();
    }
    else
    {
        $agenda = listaCitasBD($usuario);
    }
}
else
{
    header("Location:../vista/login.php");
}

?>

<body>
    <header>
        <div class="cabecera">
            <?php
            include "cabeceraNormal.php";
            ?>
        </div>
    </header>
    <table id="agenda">
        <thead>
            <th>Fecha</th>
            <th>Servicio</th>
            <th>observaciones</th>
        </thead>
        <tbody>
            <?php
            foreach ($agenda as $clave => $valor) {
                echo '<tr>';
                echo '<td>' . $valor->fecha_hora . '</td>';
                echo '<td>' . $valor->idservicio . '</td>';
                echo '<td>' . $valor->observaciones . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>