<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-type" content="text/html" charset="UTF-8">
    <title>Prueba PHP</title>
</head>

<body>
   <p>Prueba de pagina en PHP</p>

    <p>El nombre del servidor es: <?php print($_SERVER['SERVER_NAME']); ?></p>


    <?php

   /* $mi_entero = 3;
    $mi_real = 2.3;
    $resultado = $mi_entero + $mi_real;

    print($resultado);

    $resultado1 = $mi_entero + (int) $mi_real;
    print($resultado1);

    echo '<br>El resultado es ' . $resultado . '<br>';


    echo $_SERVER['PHP_SELF'] . '<br>';

    print($_SERVER['SERVER_ADDR'] . '<br>');

    print($_SERVER['SERVER_NAME'] . '<br>');

    print($_SERVER['DOCUMENT_ROOT'] . '<br>');

    print($_SERVER['REMOTE_ADDR'] . '<br>');

    print($_SERVER['REQUEST_METHOD'] . '<br>');


    $modulo = "DWES";
    print "<p>Módulo: $modulo</p>";
    print '<p>Módulo: $modulo</p>';*/

   // date_default_timezone_set('Europe/Madrid');
    //echo date('l jS \of F Y h:i:s A');

  /*  $numeroMes = date("m");
    $diaSemana = date("N");
    $mes;

    switch ($numeroMes) {
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

    switch ($diaSemana) {

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
    }*/

    //print $dia_semana.", ".date("j")." de ".$mes." de ".date("Y");


   /* $modulos = array("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web en entorno servidor");
    foreach ($modulos as $modulo) 
    {
                print "Módulo: ".$modulo. "<br />";
    }


    echo ("<p></p>");

    $modulos = array("PR" => "Programación", "BD" => "Bases de datos", "DWES" => "Desarrollo web en entorno servidor");
    foreach ($modulos as $codigo => $modulo) {
        print "El código del módulo ".$modulo." es ".$codigo."<br />";
    }*/

    print "<table><tr><th>VARIABLE</th><td>VALOR</td></tr>";
    foreach($_SERVER as $var => $servidor)
    {
        print "<tr><th>$var</th><td>$servidor</td></tr>";
    }
    print "</table>";

    ?>



</body>

</html>