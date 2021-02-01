<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estiloFinalizar.css">
</head>
<?php
include_once "../controlador/gbd.php";
include_once "../modelo/usuario.php";
include_once "../modelo/examen.php";
$usuario = new usuario;
$examen = new examen;
?>

<body>
    <div class="header">
        <?php
        include_once "cabecera.php";
        $usuario = $_SESSION['usuario'];
        $idusuario = $usuario->getIdusuario();
        $nombre = $usuario->getNombre();
        $apellido1 = $usuario->getApellido1();
        $apellido2 = $usuario->getApellido2();
        $codigo = $_SESSION['codExamen'];
        $examen->setCodExamen($codigo);
        $examenInfo = obtieneInfoExamenUsuario($usuario, $examen);
        ?>
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
                    <th>Hora de inicio</th>
                    <td><?php echo $examenInfo->getFechaInicio() ?></td>
                </tr>
                <tr>
                    <th>Hora de fin</th>
                    <td><?php echo $examenInfo->getFechaFin()?></td>
                </tr>
                <tr>
                    <th>Aciertos</th>
                    <td><?php echo $_SESSION['aciertos'] ?></td>
                </tr>
                <tr>
                    <th>Fallos</th>
                    <td><?php echo $_SESSION['fallos'] ?></td>
                </tr>
                <tr>
                    <th>Nota</th>
                    <td><?php echo $_SESSION['nota'] ?></td>
                </tr>
            </table>
        </div>
</body>
<script>
    localStorage.removeItem('respuestas');
</script>

</html>