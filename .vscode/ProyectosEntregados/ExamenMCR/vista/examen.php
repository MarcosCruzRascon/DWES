<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estiloExamen.css">
    <script src="../controlador/script.js"></script>
</head>
<?php
require_once "../controlador/gbd.php";
require_once "../modelo/examen.php";
require_once "../modelo/pregunta.php";
require_once "../controlador/funciones.inc.php";
date_default_timezone_set('Europe/Madrid');
?>

<body>
    <div class="header">
        <?php
        require_once "cabecera.php";
        ?>
    </div>
    <div class="examen" id="$_SESSION['codExamen']">
        <div>
            <div class="column izquierda">
                <div class="cuentaAtras">
                    <?php
                    $examen = new examen;
                    $examenProv = new examen;
                    $examenProv->setCodExamen($_SESSION['codExamen']);
                    $examen = obtieneInfoExamen($examenProv);
                    $inicio = $examen->getFechaInicio();
                    $fin =  $examen->getFechaFin();
                    $duracion = $examen->getDuracion();
                    $fechaActual = new DateTime();
                    $diferencia = $fin->diff($fechaActual);

                    $inicio = $inicio->format('H:i:s');
                    $fin = $fin->format('H:i:s');
                    $duracion = $duracion->format('H:i:s');
                    $diferencia = $diferencia->format('%H:%I:%s');

                    if ($diferencia > $duracion) {
                        $temporizador = $duracion;
                    } else {
                        $resta1 = new Datetime($duracion);
                        $resta2 = new DateTime($diferencia);
                        $dif = ($resta1->diff($resta2))->format('%H:%I:%s');
                        $prueba = new DateTime($dif);
                        $temporizador = $resta1->diff($prueba);
                        $temporizador = $temporizador->format('%H:%I:%S');
                    }

                    ?>
                    <span id="temporizador" class="tiempo"><?php echo $temporizador?></span>
                </div>
                <div id="myProgress">
                    <div id="myBar"></div>
                </div>
                <div id ="barraPreguntas" class="progress">
                <?php
                      $arrayPreguntas = obtieneExamen($_SESSION['codExamen']); 
                      for ($i=0; $i < count($arrayPreguntas); $i++) { 
                          echo '<div style="background-color:white;" class = "item" id = "'.($i).'">'.($i+1).'</div>';
                      }


                ?>
                </div>
            </div>
            <form id="formulario" action="./preguntaFinalizar.php" method="post">
                <div id="preguntas" class="column centro">
                    <?php
                    $arrayPreguntas = obtieneExamen($_SESSION['codExamen']);
                    crearExamen($arrayPreguntas);
                    ?>
                    <div id="botonesNavegar" class="botonesNavegar">
                        <button style="visibility: hidden;" class="anterior" onclick=anterior(event)>Anterior</button>
                        <button style="visibility: visible;" class="siguiente" onclick=siguiente(event)>Siguiente</button>
                    </div>
                    <button id="finalizar" class="boton" type="submit" name="finalizar" id="finalizar">Finalizar examen</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_SESSION['respuestas'])) {
        $respuestas = $_SESSION['respuestas'];
        echo ('<input type="text" id="respuestas" value="' . $respuestas . '" style="display: none;>"');
    }
    ?>

</body>
<script>
    var respuestas = document.getElementById("respuestas").value;
    var preguntas = document.getElementsByClassName("pregunta");
    var tamanio = preguntas.length;

    for (let i = 0; i < tamanio; i++) {
        var inputs = preguntas[i].getElementsByTagName("input");
        if (respuestas[i] == "A") {
            inputs[1].checked = true;
        } else if (respuestas[i] == "B") {

            inputs[2].checked = true;
        } else if (respuestas[i] == "C") {

            inputs[3].checked = true;
        } else if (respuestas[i] == "D") {
            inputs[4].checked = true;
        }
    }
    
    var marcadas = localStorage.getItem("respuestasMarcadas");
    for (let i = 0; i < tamanio; i++) {
        var inputs = preguntas[i].getElementsByTagName("input");
        if(i==marcadas[i])
        {
            inputs[0].checked=true;
        }
        else
        {
            inputs[0].checked=false;
        }
    }

    
    for (let i = 0; i < tamanio; i++) {
        var itemIzquierda = document.getElementsByClassName("item");
        var itemCambiar = itemIzquierda[i];
        var input =preguntas[i].getElementsByTagName("input");
        if(input[0].checked==true)
        {
            itemCambiar.style.backgroundColor = "orange"
        }
        else if(input[0].checked==false && input[i].checked==true)
        {
            itemCambiar.style.backgroundColor = "green"
        }
        else
        {
            itemCambiar.style.backgroundColor = "white"
        }
    }

</script>

</html>