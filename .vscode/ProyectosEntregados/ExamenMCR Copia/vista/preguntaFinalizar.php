<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilosPregunta.css">
    <?php
    include_once "../controlador/gbd.php";
    include_once "../modelo/usuario.php";
    $usuario = new usuario;
    ?>
</head>

<body>
    <header>
        <?php
        include_once 'cabecera.php';
        $codigo = $_SESSION['codExamen'];
        $tamanio = count(obtieneExamen($codigo));
        $respuestas = "";
        for ($i = 1; $i <= $tamanio; $i++) {
            $respuestas .= (empty($_POST[$i])) ? " " : $_POST[$i];
        }
        $_SESSION['respuestas'] = $respuestas;
        $usuario = $_SESSION['usuario'];
        $idusuario = $usuario->getIdusuario();
        $nombre = $usuario->getNombre();
        $apellido1 = $usuario->getApellido1();
        $apellido2 = $usuario->getApellido2();
        $codigo = $_SESSION['codExamen'];
        ?>
    </header>
    </div>
        <h1>EXAMEN <?php echo $_SESSION['codExamen']?></h1>
        <div class="tabla" style="background-color:#bbb;">
            <table>
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $nombre ?></td>
                </tr>
                <tr>
                    <th>Primer apellido</th>
                    <td><?php echo $apellido1 ?></td>
                </tr>
                <tr>
                    <th>Segundo Apellido</th>
                    <td><?php echo $apellido2 ?></td>
                </tr>
                <tr>
                    <th>Preguntas sin responder</th>
                    <td id="norespondidas"></td>
                </tr>
                <tr>
                    <th>Preguntas marcadas</th>
                    <td id="marcadas"></td>
                </tr>
            </table>
        </div>
    <h3>Esta seguro de entregar el examen</h3>
    <div class="botonera">
        <a class="boton" href='../controlador/examen_controller.php'>Si</a>
        <a class="boton" href='examen.php'>No</a>
    </div>
    <script>
        if (typeof localStorage.getItem("respuestas") !== 'undefined') {
            var respuestas = localStorage.getItem("respuestas");
            if (respuestas != null) {
            var boton = document.getElementsByClassName("boton");
            boton[1].style.display = "none";
            }
         }

         var sinresponder = localStorage.getItem("norespondidas")
         var textoSinresponder = document.getElementById("norespondidas");
         textoSinresponder.innerHTML = sinresponder;

         var marcadas = localStorage.getItem("marcadas")
         var textoMarcadas = document.getElementById("marcadas");
         textoMarcadas.innerHTML = marcadas;

        
    </script>
</body>

</html>