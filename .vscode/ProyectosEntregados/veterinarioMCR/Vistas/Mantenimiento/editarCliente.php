<body>
    <?php
    $valida = new Validacion();
    if (isset($_POST['submit'])) {
        $valida->Requerido('dni');
        $valida->Requerido('nombre');
        $valida->Requerido('ape1');
        $valida->Requerido('ape2');
        $valida->Requerido('correo');
        $valida->Requerido('telefono');
        $valida->dni('dni');
        $valida->Patron('nombre', '/^([A-Z]|[a-z]{1}[a-zñáéíóú]+[\s]*)+$/');
        $valida->Patron('ape1', '/^([A-Z]|[a-z]{1}[a-zñáéíóú]+[\s]*)+$/');
        $valida->Patron('ape2', '/^([A-Z]|[a-z]{1}[a-zñáéíóú]+[\s]*)+$/');
        if ($valida->ValidacionPasada()) {
            //$numExpediente =  str_replace("-", "", $_POST['fechaNacimiento']) . "" . substr($_POST['cliente'], -4);
            //$arrayMascota = ['numeroExpediente' => $numExpediente, 'nombre' => $_POST['nombre'], 'fechaNacimiento' => $_POST['fechaNacimiento'], 'idespecie' => $_POST['especie'], 'genero' => $_POST['genero'], 'cliente_idusuario' => $_POST['cliente']];
            //$nombreGenerado = str_replace(' ', '', $_POST['nombre']) . substr($_POST['dni'], 5, 9);
            $contraseniaBase = $_POST['dni'];
           
            try {
               $clavePrimaria = [$_POST['id']];
               $campos = ['password' => $contraseniaBase, 'dni' => $_POST['dni'], 'nombre' => $_POST['nombre'], 'apellido1' => $_POST['ape1'], 'apellido2' => $_POST['ape2'], 'correo' => $_POST['correo'], 'telefono' => $_POST['telefono'], 'idrol' => 2];
                $conexion->update('cliente',$campos , $clavePrimaria);
                header("location:?menu=listadoclientes");
            } catch (\Throwable $th) {
                $valida->setError('add', 'Error al modifical el cliente');
            }
        }
    }
    $cliente = $sesion::leer('usuario');
    if (!empty($cliente)) {
        $rolUsuario = $cliente[0]->getIdrol();
        if ($cliente[0]->getIdrol() == 1) {
            if (isset($_GET['idcliente'])) {
                $busqueda = [$_GET['idcliente']];
                $cliente = $conexion->findById('cliente', $busqueda);
            } else {
                header("location:?menu=listadoanimales");
            }
        } else {
            header("location:?menu=login");
        }
    } else {
        header("location:?menu=login");
    }
    ?>
    <script src="./js/script2.js"></script>
    <div class="formNueva">
        <form method='post'>
            <center>
                <h1>Registro de cliente</h1><h3><?= $valida->ImprimirError('add'); ?></h3>
            </center>
            <input name="id" type="text" value="<?php echo $cliente[0]->getIdusuario() ?>" hidden>
            <div id="dni"><label>
                    <h2>DNI</h2>
                </label><input name="dni" type="text" value="<?php echo $cliente[0]->getDni() ?>"><?= $valida->ImprimirError('dni'); ?></div><br />
            <div id="nombre"><label>
                    <h2>Nombre</h2>
                </label><input name="nombre" type="text" value="<?php echo $cliente[0]->getNombre() ?>"><?= $valida->ImprimirError('nombre'); ?></div><br />
            <div id="ape1"><label>
                    <h2>Primer apellido</h2>
                </label><input name="ape1" type="text" value="<?php echo $cliente[0]->getApellido1() ?>"><?= $valida->ImprimirError('ape1'); ?></div><br />
            <div id="ape2"><label>
                    <h2>Segundo apellido</h2>
                </label><input name="ape2" type="text" value="<?php echo $cliente[0]->getApellido2() ?>"><?= $valida->ImprimirError('ape2'); ?></div><br />
            <div id="correo"><label>
                    <h2>Correo</h2>
                </label><input name="correo" type="text" value="<?php echo $cliente[0]->getCorreo() ?>"><?= $valida->ImprimirError('correo'); ?></div><br />
            <div id="telefono"><label>
                    <h2>Telefono</h2>
                </label><input name="telefono" type="text" value="<?php echo $cliente[0]->getTelefono() ?>"><?= $valida->ImprimirError('telefono'); ?></div><br />
            <button type="submit" class="botones" name="submit">Guardar</button>
        </form>
    </div>