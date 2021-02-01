<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Utilización include -->
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Fecha en castellano</title>
</head>

<body>
    <?php
    date_default_timezone_set('Europe/Madrid');
    include 'funciones.inc.php';
    echo fechaTotal();
    ?>
</body>

</html>


<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Utilización include -->
<!-- Fichero: funciones.inc.php -->
<?php
// Función que devuelve un texto con la fecha actual en castellano
function fechaMes()
{
   
    $numero_mes = date("m");
    
    switch ($numero_mes) {
        case 1:
            $mes = "Enero";
            break;
        case 2:
            $mes = "Febrero";
            break;
        case 3:
            $mes = "Marzo";
            break;
        case 4:
            $mes = "Abril";
            break;
        case 5:
            $mes = "Mayo";
            break;
        case 6:
            $mes = "Junio";
            break;
        case 7:
            $mes = "Julio";
            break;
        case 8:
            $mes = "Agosto";
            break;
        case 9:
            $mes = "Septiembre";
            break;
        case 10:
            $mes = "Octubre";
            break;
        case 11:
            $mes = "Noviembre";
            break;
        case 12:
            $mes = "Diciembre";
            break;
    }

    return $mes;
}

function fechaDia()
{
    $numero_dia_semana = date("N");
    switch ($numero_dia_semana) {
        case 1:
            $dia_semana = "Lunes";
            break;
        case 2:
            $dia_semana = "Martes";
            break;
        case 3:
            $dia_semana = "Miércoles";
            break;
        case 4:
            $dia_semana = "Jueves";
            break;
        case 5:
            $dia_semana = "Viernes";
            break;
        case 6:
            $dia_semana = "Sábado";
            break;
        case 7:
            $dia_semana = "Domingo";
            break;
    }

    return $dia_semana;
}

function fechaTotal()
{
    return date(fechaDia() . ", " . "j" . " de " . fechaMes() . " de " . "Y");
}
?>