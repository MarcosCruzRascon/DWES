<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilosNohora.css">
</head>
<?php
    include_once "../controlador/gbd.php"
?>

<body>
    <header>
        <?php
        require_once "cabecera.php";
        ?>
    </header>
    <?php
        include_once '../modelo/examen.php';
        $codigo = $_SESSION['codExamen'];
        $examen = new examen;
        $examen->setCodExamen($codigo);
        $examenRealizar=obtieneInfoExamen($examen);
        $fechaInicioExamen=$examenRealizar->getFechaInicio();
        $fechaFinExamen=$examenRealizar->getFechaFin();


        $diaInicio = $fechaInicioExamen->format('d');
        $mesInicio = $fechaInicioExamen->format('m');;
        $anioInicio = $fechaInicioExamen->format('Y');;
        $horaInicio = $fechaInicioExamen->format('G');;
        $minutoIncio= $fechaInicioExamen->format('i');;

        $diaFin=$fechaFinExamen->format('d');;
        $mesFin = $fechaFinExamen->format('m');;
        $anioFin = $fechaFinExamen->format('Y');;
        $horaFin=$fechaFinExamen->format('G');;
        $minutoFin=$fechaFinExamen->format('i');;

        $fechaInicio = $diaInicio . "/" . $mesInicio . "/" . $anioInicio;
        $fechaFin = $diaFin . "/" . $mesFin . "/" . $anioFin;
        $horaInicial = $horaInicio . ":" . $minutoIncio;
        $horaFinal = $horaFin . ":" . $minutoFin;


        if(isset($_GET["pasado"]))
        {
            echo ("
            <div class='error'>
                <h1>La fecha para realizar el examen ya ha pasado</h1>
                
                <p>El examen se podia realizar a partir del dia $fechaInicio
                   desde las $horaInicial hasta las $horaFinal</p>
            </div>
            <div class='boton'>
                <a class='botonSalir' href='../controlador/unlogin_controller.php'>Salir</a>
            </div>");
        }
        else
        {
            echo ("
            <div class='error'>
                <h1>No puede realizar su examen en este momento</h1>
                
                <p>El examen se podra realizar a partir del dia $fechaInicio
                   desde las $horaInicial hasta las $horaFinal</p>
            </div>
            <div class='boton'>
                <a class='botonSalir' href='../controlador/unlogin_controller.php'>Salir</a>
            </div>");
        }
    ?>
   
</body>

</html>