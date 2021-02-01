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
            $numExpediente =  str_replace("-", "", $_POST['fechaNacimiento']) . "" . substr($_POST['cliente'], -4);
            $arrayMascota = ['numeroExpediente' => $numExpediente, 'nombre' => $_POST['nombre'], 'fechaNacimiento' => $_POST['fechaNacimiento'], 'idespecie' => $_POST['especie'], 'genero' => $_POST['genero'], 'cliente_idusuario' => $_POST['cliente']];
            try {
                $conexion->add('mascota', $arrayMascota);
                header("location:?menu=nuevaMascota");
            } catch (\Throwable $th) {
                $valida->setError('add', 'Error al insertar la mascota');
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
    <script src="./js/script2.js"></script>
    <div class="formNueva">
        <form method='post'>
            <center>
                <h1>Registro de mascota</h1><?= $valida->ImprimirError('add'); ?>
            </center>
            <br /><br />
            <label>
                <h2>Seleccione el cliente</h2>
            </label><br />
            <input id="cliente" name="clienteCompleto" type="text" value="<?php if (isset($_GET['select'])) {
                                                                                $seleccionado = [$_GET['select']];
                                                                                $userSeleccionado = $conexion->findById('cliente', $seleccionado);
                                                                                $nombre = $userSeleccionado[0]->nombreCompleto();
                                                                                echo $nombre;
                                                                            } ?>">
            <input name="cliente" value="<?php if (isset($_GET['select'])) {
                                                $seleccionado = [$_GET['select']];
                                                echo $seleccionado[0];
                                            }
                                            ?>" hidden>
            <?= $valida->ImprimirError('cliente'); ?>
            <button id="btnModal" class="botones">Buscar cliente</button>
            <div id="tvesModal" class="modalContainer">
                <div class="modal-content">
                    <h2>Seleccionar cliente</h2>
                    <script src="./js/scriptBuscar.js"></script>
                    <p><label>Buscar</label><input type="text" id="busqueda" onkeyup="doSearchClientes()"></p>
                    <table id="clientes" class="blueTable">
                        <thead>
                            <th>Nombre</th>
                            <th>Seleccion</th>
                        </thead>
                        <tbody>
                            <?php
                            $arrayClientes = $conexion->getAll('cliente');
                            foreach ($arrayClientes as $clave => $valor) {
                                if ($valor->getIdrol() != 1) {
                                    $idusuario = $valor->getIdusuario();
                                    echo '<tr>';
                                    echo '<td>' .  $valor->nombreCompleto() . '</td>';
                                    echo '<td>';
                                    echo '<a class="botones" href="?menu=nuevaMascota&select=' . $idusuario . '">Seleccionar</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <span class="close botones">Cancelar</span>
                </div>
            </div>

            <br /> <br />
            <div id="nombre"><label>
                    <h2>Nombre</h2>
                </label><input name="nombre" type="text"><?= $valida->ImprimirError('nombre'); ?></div><br />
            <div id="fechaNacimiento"><label>
                    <h2>Fecha de nacimiento</h2>
                </label><input name="fechaNacimiento" type="date"><?= $valida->ImprimirError('fechaNacimiento'); ?></div><br />
            <div id="especie"><label>
                    <h2>Especie</h2>
                </label><select name="especie">
                    <option value="">Seleccione una especie</option>
                    <?php
                    $especie = $conexion->getAll('especie');
                    foreach ($especie as $key => $value) {
                        echo '<option value="' . $value->getIdespecie() . '">';
                        echo $value->getNombre();
                        echo '</option>';
                    };
                    ?>
                </select><?= $valida->ImprimirError('especie'); ?></div><br />
            <div id="genero"><label>
                    <h2>Genero</h2>
                </label><select name="genero">
                    <option value="">Seleccione un genero</option>
                    <?php
                    $genero = $conexion->getAll('genero');
                    foreach ($genero as $key => $value) {
                        echo '<option value="' . $value->getGenero() . '">';
                        echo $value->getDescripcion();
                        echo '</option>';
                    };
                    ?>
                </select><?= $valida->ImprimirError('genero'); ?></div><br />
            <button type="submit" class="botones" name="submit">Guardar</button>
        </form>
    </div>