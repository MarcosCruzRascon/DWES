<body>
    <?php
    $valida = new Validacion();
    if (isset($_POST['submit'])) {
        $actualizaCita = null;
        $valida->Requerido('cliente');
        $valida->Requerido('mascotas');
        $valida->Requerido('motivo');
        $valida->Requerido('tratamiento');
        if (isset($_POST['checkvacuna'])) {
            $valida->Requerido('vacuna');
        }
        if ($valida->ValidacionPasada()) {
            $fechaVisita = new DateTime();
            $fechaVisita = $fechaVisita->format('Y-m-d H:i:s');
            $arrayVisita = ['motivo' => $_POST['motivo'], 'tratamiento' => $_POST['tratamiento'], 'observaciones' => $_POST['observaciones'], 'numeroExpediente' => $_POST['mascotas'], 'fechaVisita' => $fechaVisita];
            if ($_POST['numeroCita'] != "") {
                $actualizaCita = true;
            } else {
                $actualizaCita = false;
            }
            try {
                $conexion->add('visita', $arrayVisita);
                if (isset($_POST['checkvacuna'])) {
                    $arrayVacuna = ['fechaVacunacion' => $fechaVisita, 'observaciones' => $_POST['observaciones'], 'vacunas_idVacuna' => $_POST['vacuna'], 'mascota_numeroExpediente' => $_POST['mascotas']];
                    $conexion->add('cartillavacunacion', $arrayVacuna);
                }
                if ($actualizaCita) {

                    $actualiza = ['idCita' => $_POST['numeroCita']];
                    $citaActualizar = $conexion->findByOne('cita', $actualiza);
                    $clavePrimariaCita = [$citaActualizar[0]->getFechaCita(), $citaActualizar[0]->getCliente_idusuario(),];
                    $camposCita = ['realizada' => "1"];
                    $conexion->update('cita', $camposCita, $clavePrimariaCita);
                }
                header("location:?menu=nuevaVisita");
            } catch (\Throwable $th) {
                $valida->setError('add', 'Error al realizar la visita');
            }
        }
    }
    $cliente = $sesion::leer('usuario');
    if (!empty($cliente)) {
        $rolUsuario = $cliente[0]->getIdrol();
        if ($cliente[0]->getIdrol() == 1) {
            $arrayClientes = $conexion->getAll('cliente');
        } else {
            header("location:?menu=login");
        }
    } else {
        header("location:?menu=login");
    }
    ?>
    <script src="./js/script.js"></script>
    <div id="nuevaCita" class="formNueva">
        <form class="nuevaCita" method='post'>
            <center>
                <h1>Realizar visita</h1><?= $valida->ImprimirError('add'); ?>
            </center>
            <br /><br />
                <input name="numeroCita" value="<?php if (isset($_GET['numeroCita'])) {
                $citaId = [$_GET['numeroCita']]; 
                echo $citaId[0]; } ?>" hidden>
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
                                foreach ($arrayClientes as $clave => $valor) {
                                    if ($valor->getIdrol() != 1) {
                                        $idusuario = $valor->getIdusuario();
                                        echo '<tr>';
                                        echo '<td>' .  $valor->nombreCompleto() . '</td>';
                                        echo '<td>';
                                        echo '<a class="botones" href="?menu=nuevaVisita&select=' . $idusuario . '">Seleccionar</a>';
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
                <br /><br /><label>
                    <h2>Seleccione la mascota</h2>
                </label><br />
                <select name="mascotas">
                    <option value="">Seleccione una mascota</option>
                    <?php
                    if (isset($_GET['select'])) {
                        $seleccionado = ['cliente_idusuario' => $_GET['select']];
                        $mascotas = $conexion->findByOne('mascota', $seleccionado);
                        foreach ($mascotas as $key => $value) {
                            echo '<option value="' . $value->getNumeroExpediente() . '">';
                            echo $value->getNombre();
                            echo '</option>';
                        }
                    }
                    ?>
                </select>
                <?= $valida->ImprimirError('mascotas'); ?> <br /><br />
                
                <input id="vacuna" type="checkbox" name="checkvacuna">&nbsp;&nbsp;<label>¿Se le suministra vacuna?</label><br />
                <div id="vacunacion" style="display: none;">
                    <select name="vacuna">
                        <option value="">Seleccione una vacuna</option>
                        <?php
                        $vacunas = $conexion->getAll('vacunas');
                        foreach ($vacunas as $key => $value) {
                            echo '<option value="' . $value->getIdVacuna() . '">';
                            echo $value->getNombre();
                            echo '</option>';
                        }
                        ?>
                    </select>
                </div><?= $valida->ImprimirError('vacuna'); ?>

                <br /> <br />


                <label>
                    <h2>Motivo de la visita</h2>
                </label><br />
                <textarea id="motivo" cols="40" rows="5" name="motivo"></textarea>
                <?= $valida->ImprimirError('motivo'); ?><br /><br />
                <label>
                    <h2>Tratamiento</h2>
                </label><br />
                <textarea id="tratamiento" cols="40" rows="5" name="tratamiento"></textarea>
                <?= $valida->ImprimirError('tratamiento'); ?><br /><br />
                <label>
                    <h2>Observaciones</h2>
                </label><br />
                <textarea cols="40" rows="5" name="observaciones"></textarea>
                <?= $valida->ImprimirError('observaciones'); ?><br /><br />
                <button type="submit" class="botones" name="submit">Visita realizada</button>
        </form>
    </div>
</body>