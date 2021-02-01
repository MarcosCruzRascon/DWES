<?php
include_once "../control/GBD.inc.php";
include_once "../control/funciones.inc.php";

$listaServicios = listaServicioBD();

if (isset($_POST['botonHoras'])) {
    if (empty($_POST['fechacita'])) {
        $error = "Debes elegir un dia";
    } else {
        $fecha = $_POST['fechacita'];
        $horasLibres = horasLibre($fecha);
    }
}

if (isset($_POST['botonConfirma'])) {
    if (isset($_POST['fechacita'])) {
        $fecha = $_POST['fechaCita'];
        $hora = $_POST['hora'];
    }
}
if(isset($_POST['confirmar']))
{
    if(isset($_POST['fechacita']) && isset($_POST['hora']) && isset($_POST['servicios']))
    {
        $fecha=$_POST['fechacita'];
        $hora=$_POST['hora'];
        $fecha_hora=$fecha." ".$hora;
        $servicio = $_POST['servicios'];
        if(!empty($_POST['observaciones']))
        {
            $observaciones=$_POST['observaciones'];
        }
        else
        {
            $observaciones="";
        }
        echo $fecha_hora,$observaciones,$servicio;
        session_start();
        
        if(!isset($_SESSION['usuario']))
        {
            header("Location:../vista/login.php");
        }
        else
        {
            $usuarioSesion=$_SESSION['usuario'];
            grabarCitaBD($fecha_hora,$observaciones,$usuarioSesion,$servicio);
            header("Location:../vista/agenda.php");
        }
    }
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Inicio</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <div class="cabecera">
            <?php
            include "cabeceraNormal.php";
            ?>
        </div>
    </header>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="cuerpoCitas">
            <input type="date" name="fechacita" min='<?php $fecha = new Datetime() ?>' value="<?php if (isset($_POST['fechacita'])) echo $_POST['fechacita'] ?>">
            <button type="submit" name="botonHoras">Ver horas</button>
            <select name="hora">
                <?php
                foreach ($horasLibres as $key) {
                    echo "<option value=$key>$key</option>";
                }
                ?>
            </select>
            <select name="servicios">
                <?php
                foreach ($listaServicios as $key) {
                    echo '<option value=' . $key->idservicio . '>' . $key->nombreServicio . '</option>';
                }
                ?>
            </select>
        </div>
        <p class="motivo">Motivo de la consulta</p>
        <textarea name="observaciones " rows="10" cols="70"></textarea>
        <button class="botonConfirma" type="submit" name="confirmar">Confirmar</button>
    </form>
    
        

</body>

</html>