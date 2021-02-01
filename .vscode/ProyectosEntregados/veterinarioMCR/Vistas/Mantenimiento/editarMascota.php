<body>
    <?php
    $valida = new Validacion();
    if (isset($_POST['submit'])) {
        $valida->Requerido('cliente');
        $valida->Requerido('nombre');
        $valida->Requerido('fechaNacimiento');
        $valida->Requerido('especie');
        $valida->Requerido('genero');
        $valida->Patron('nombre', '/^([A-Z]|[a-z]{1}[a-zñáéíóú]+[\s]*)+$/');
        if ($valida->ValidacionPasada()) {
            //$numExpediente =  str_replace("-", "", $_POST['fechaNacimiento']) . "" . substr($_POST['cliente'], -4);
            //$arrayMascota = ['numeroExpediente' => $numExpediente, 'nombre' => $_POST['nombre'], 'fechaNacimiento' => $_POST['fechaNacimiento'], 'idespecie' => $_POST['especie'], 'genero' => $_POST['genero'], 'cliente_idusuario' => $_POST['cliente']];
            try {
                $clavePrimaria = [$_POST['mascota']];
                $campos = ['nombre' => $_POST['nombre'], 'fechaNacimiento' => $_POST['fechaNacimiento']];
                $conexion->update('mascota',$campos , $clavePrimaria);
                header("location:?menu=listadoanimales");
            } catch (\Throwable $th) {
                $valida->setError('add', 'Error al insertar la mascota');
            }
        }
    }
    $cliente = $sesion::leer('usuario');
    if (!empty($cliente)) {
        $rolUsuario = $cliente[0]->getIdrol();
        if ($cliente[0]->getIdrol() == 1) {
            if (isset($_GET['numExp'])) {
                $busqueda = [$_GET['numExp']];
                $mascota = $conexion->findById('mascota', $busqueda);
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
                <h1>Registro de mascota</h1><?= $valida->ImprimirError('add'); ?>
            </center>
            <input id="mascota" name="mascota" type="text" value="<?php echo $mascota[0]->getNumeroExpediente() ?>" hidden>
            <label>
                <h2>Cliente</h2>
            </label><br />
            <?php
            $arrayCliente = [$mascota[0]->getCliente_idusuario()];
            $datoCliente = $conexion->findById('cliente', $arrayCliente)
            ?>
            <input id="cliente" name="clienteCompleto" type="text" value="<?php echo $datoCliente[0]->nombreCompleto() ?>" disabled>
            <input id="cliente" name="cliente" type="text" value="<?php echo $datoCliente[0]->getIdusuario() ?>" hidden>
            <br /> <br />
            <div id="nombre"><label>
                    <h2>Nombre</h2>
                </label><input name="nombre" type="text" value="<?php echo $mascota[0]->getNombre() ?>"><?= $valida->ImprimirError('nombre'); ?></div><br />
            <div id="fechaNacimiento"><label>
                    <h2>Fecha de nacimiento</h2>
                    <?php $fecha = $mascota[0]->getFechaNacimiento();
                    $fecha = new DateTime($fecha);
                    $fecha = $fecha->format('Y-m-d')?>
                </label><input name="fechaNacimiento" type="date" value="<?php echo $fecha ?>"><?= $valida->ImprimirError('fechaNacimiento'); ?></div><br />
            <div id="especie"><label>
                    <h2>Especie</h2>
                    <?php
                    $arrayEspecie = [$mascota[0]->getIdespecie()];
                    $datoEspecie = $conexion->findById('especie', $arrayEspecie)
                    ?>
                </label><input name="especieCompleta" type="text" value="<?php echo $datoEspecie[0]->getNombre() ?>" disabled>
                <input name="especie" type="text" value="<?php echo $datoEspecie[0]->getIdespecie() ?>" hidden></div><br />
            <div id="genero"><label>
                    <h2>Genero</h2>
                    <?php
                    $arrayGenero = [$mascota[0]->getGenero()];
                    $datoGenero = $conexion->findById('genero', $arrayGenero)
                    ?>
                </label><input name="generoCompleto" type="text" value="<?php echo  $datoGenero[0]->getDescripcion() ?>" disabled>
                <input name="genero" type="text" value="<?php echo$datoGenero[0]->getGenero() ?>" hidden></div><br />
            <button type="submit" class="botones" name="submit">Guardar</button>
        </form>
    </div>