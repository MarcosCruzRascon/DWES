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
        $valida->Patron('telefono', '/^[9|6|7]{1}([\d]{2}[-]*){3}[\d]{2}$/');
        $valida->Patron('nombre', '/^([A-Z]|[a-z]{1}[a-zñáéíóú]+[\s]*)+$/');
        $valida->Patron('ape1', '/^([A-Z]|[a-z]{1}[a-zñáéíóú]+[\s]*)+$/');
        $valida->Patron('ape2', '/^([A-Z]|[a-z]{1}[a-zñáéíóú]+[\s]*)+$/');
        if ($valida->ValidacionPasada()) {
            $nombreGenerado = str_replace(' ', '', $_POST['nombre']) . substr($_POST['dni'], 5, 9);
            $contraseniaBase = $_POST['dni'];
            $array = ['idusuario' => $nombreGenerado, 'password' => $contraseniaBase, 'dni' => $_POST['dni'], 'nombre' => $_POST['nombre'], 'apellido1' => $_POST['ape1'], 'apellido2' => $_POST['ape2'], 'correo' => $_POST['correo'], 'telefono' => $_POST['telefono'], 'idrol' => 2];
            try {
                $conexion->add('cliente', $array);
                require_once "./helper/envioCorreo.php";
                $mensaje = '<h2 style="color: #5e9ca0; text-align: center;">Bienvenido a Veterinaria Cuidaditos</h2>
                <p>La pagina de veterinaria cuidaditos le proveera de toda la informaci&oacute;n sobre nosotros y sobre el cuidado de sus animales.</p>
                <p>Para iniciar sesion en su cuenta necesitara los siguientes datos:</p>
                <ul>
                <li>Usuario ='. $nombreGenerado.'</li>
                <li>Contrase&ntilde;a = '.$contraseniaBase.'</li>
                </ul>
                <p><strong>&nbsp;</strong></p>';
                enviar($mensaje,$_POST['correo']);
                header("location:?menu=nuevaMascota&select=$nombreGenerado");
            } catch (\Throwable $th) {
                $valida->setError('add', 'Error al insertar al cliente');
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
    <div class="formNueva">
        <form method='post'>
            <center>
                <h1>Registro de cliente</h1><?= $valida->ImprimirError('add'); ?>
            </center>
            <div id="dni"><label>
                    <h2>DNI</h2>
                </label><input name="dni" type="text"><?= $valida->ImprimirError('dni'); ?></div><br />
            <div id="nombre"><label>
                    <h2>Nombre</h2>
                </label><input name="nombre" type="text"><?= $valida->ImprimirError('nombre'); ?></div><br />
            <div id="ape1"><label>
                    <h2>Primer apellido</h2>
                </label><input name="ape1" type="text"><?= $valida->ImprimirError('ape1'); ?></div><br />
            <div id="ape2"><label>
                    <h2>Segundo apellido</h2>
                </label><input name="ape2" type="text"><?= $valida->ImprimirError('ape2'); ?></div><br />
            <div id="correo"><label>
                    <h2>Correo</h2>
                </label><input name="correo" type="text"><?= $valida->ImprimirError('correo'); ?></div><br />
            <div id="telefono"><label>
                    <h2>Telefono</h2>
                </label><input name="telefono" type="text"><?= $valida->ImprimirError('telefono'); ?></div><br />
            <button type="submit" class="botones" name="submit">Guardar</button>
        </form>
    </div>