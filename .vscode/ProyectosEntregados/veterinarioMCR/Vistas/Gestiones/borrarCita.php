<body>
    <?php
    if (isset($_POST['borrar'])) {
        if($_POST['borrar']=="cancelar")
        {
            header("location:?menu=agenda");
        }
        else if($_POST['borrar']=="aceptar")
        {
            $arrayCita=['idCita'=>$_GET['id']];
            $cita = $conexion->findByOne('cita',$arrayCita);
            $clavesPrimarias = [$cita[0]->getFechaCita(),$cita[0]->getCliente_idusuario()];
           try {
               $conexion->delete('cita',$clavesPrimarias);
               header("location:?menu=agenda");
           } catch (\Throwable $th) {
               
           }
        }
    }
    $cliente = $sesion::leer('usuario');
    if (!empty($cliente)) {
        $rolUsuario = $cliente[0]->getIdrol();
        if ($cliente[0]->getIdrol() == 1) {
        } else {
            header("location:?menu=login");
        }
    } else {
        header("location:?menu=login");
    }
    ?>
    <link rel="stylesheet" href="./.css">
    <div id="borrarCita" class="formNueva">
        <form class="borrarCita" method='post'>
            <center><h2>¿Esta seguro que quiere eliminar la cita?</h2>
            <button type="submit" class="botones" name="borrar" value="aceptar">Aceptar</button>
            <button type="submit" class="botones" name="borrar" value="cancelar">Cancelar</button>
            </center>
        </form>