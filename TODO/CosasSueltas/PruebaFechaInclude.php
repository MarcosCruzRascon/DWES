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
    include 'funcionesfecha.inc.php';
   /* $date = date('Y-m-d H:i:s');
    $a = mañanaTarde($date);
    echo $a;*/

    $fecha = date('2000-01-01');
    $fechaBuena = date("d-m-Y", strtotime($fecha)); 
    $b = estaciones($fechaBuena);
    echo $b;

    ?>
</body>

</html>