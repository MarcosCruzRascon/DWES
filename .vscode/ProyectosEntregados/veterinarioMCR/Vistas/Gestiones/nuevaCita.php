<body>
    <?php
    $diaDeHoy="";
    $valida = new Validacion();
    if (isset($_POST['submit'])) {
        $valida->Requerido('cliente');
        $valida->Requerido('fechaCita');
        $valida->Requerido('horaInicio');
        $valida->Requerido('horaFin');
        $valida->Requerido('motivos');
        if ($valida->ValidacionPasada()) {
            $inicial = $_POST['horaInicio'];
            $fin = $_POST['horaFin'];
            $fecha = $_POST['fechaCita'];
            $citas = $conexion->getAll('cita');
            $horas = [];
            foreach ($citas as $key => $value1) {
                array_push($horas, $value1->getFechaCita());
            }

            $horasOcupadas = [];
            foreach ($horas as $key => $value2) {
                $fecha = new DateTime($value2);
                array_push($horasOcupadas, $fecha->format('H:i'));
            }
            $elegidaInicio = $_POST['fechaCita'] . " " . $inicial . ":00";
            $elegidaFin = $_POST['fechaCita'] . " " . $fin . ":00";
            /*$elegidaInicio = new DateTime($elegidaInicio);
            $elegidaFin = new DateTime($elegidaFin);*/
            $elegidaInicio = strtotime($elegidaInicio);
            $elegidaFin = strtotime($elegidaFin);
            $horasFinOcupadas = [];
            foreach ($citas as $key => $value3) {
                $duracion = $value3->getDuracion();
                $duracion = explode(":", $duracion);
                $fecha = new DateTime($value3->getFechaCita());
                $fecha->modify("+$duracion[0] hour");
                $fecha->modify("+$duracion[1] minute");
                $fecha->modify("+$duracion[2] second");
                array_push($horasFinOcupadas, $fecha->format('H:i'));
            }

            for ($i = 0; $i < count($horasOcupadas); $i++) {
                $horasOcupadas[$i] = strtotime($horasOcupadas[$i]);
                $horasFinOcupadas[$i] = strtotime($horasFinOcupadas[$i]);
            }

            for ($i = 0; $i < count($citas); $i++) {
                $inicioEntreDos = $elegidaInicio > $horasOcupadas[$i] && $elegidaInicio < $horasFinOcupadas[$i];
                $finEntreDos = $elegidaFin > $horasOcupadas[$i] && $elegidaFin < $horasFinOcupadas[$i];
                $ampliado = $elegidaInicio < $horasOcupadas[$i] && $elegidaFin > $horasFinOcupadas[$i];

                if ($inicioEntreDos || $finEntreDos || $ampliado) { {
                        $valida->setError('add', 'Error el tramo horario elegido interfiere con otras citas');
                    }
                }
            }
            if ($valida->ValidacionPasada()) {
                $elegidaInicio = $_POST['fechaCita'] . " " . $inicial . ":00";
                $idCita = str_replace('-', '', $elegidaInicio);
                $idCita = str_replace(':', '', $idCita);
                $idCita = str_replace(' ', '', $idCita);
                $elegidaFin = $_POST['fechaCita'] . " " . $fin . ":00";
                $diaDeHoy = new DateTime();
                $diaDeHoy->setTime(0,0,0);
                $diaDeHoy = $diaDeHoy->format('H:i:s');
                if (strtotime($elegidaInicio) > strtotime($diaDeHoy)) {
                    if (strtotime($elegidaInicio) < strtotime($elegidaFin)) {
                        $elegidaInicioDate = new DateTime($elegidaInicio);
                        $elegidaFinDate = new DateTime($elegidaFin);
                        $interval = $elegidaInicioDate->diff($elegidaFinDate);

                        $arrayCita = ['fechaCita' => $elegidaInicio, 'cliente_idusuario' => $_POST['cliente'], 'motivos' => $_POST['motivos'], 'duracion' => $interval->format('%H:%I:%S'), 'idCita' => $idCita];
                        try {

                            $conexion->add('cita', $arrayCita);
                            header("location:?menu=nuevaCita");
                        } catch (\Throwable $th) {
                            $valida->setError('add', 'Error con la base de datos');
                        }
                    } else {
                        $valida->setError('add', 'Error en la hora de inicio y fin');
                    }
                }
                else
                {
                    $valida->setError('add', 'Ha seleccionado una fecha pasada');
                }
            }
        }
    }
    $cliente = $sesion::leer('usuario');
    if (!empty($cliente)) {
        $rolUsuario = $cliente[0]->getIdrol();
        if ($cliente[0]->getIdrol() == 1) {
            $citas = $conexion->getAll('cita');
        } else {
            header("location:?menu=login");
        }
    } else {
        header("location:?menu=login");
    }
    ?>
    <style>
        section {
            width: 100%;
        }

        .agendita {
            float: left;
            width: 50%;
            padding-left: 1%;
        }

        .nuevaCita {
            float: left;
            width: 45%;
        }
    </style>
    <script src="./js/script2.js"></script>
    <center>
        <h1>Nueva cita</h1>
        <h3 style="color: red;"><?= $valida->ImprimirError('add'); ?></h3>
    </center>
    <div id="nuevaCita" class="formNueva nuevaCita">
        <form id="form" class="nuevaCita" method='post'>
            <label>
                <h2>Cliente</h2>
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
                                    echo '<a class="botones" href="?menu=nuevaCita&select=' . $idusuario . '">Seleccionar</a>';
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
            <br /><br /><br /><br />
            <label>
                <h2>Fecha para la cita</h2>
            </label><br />
            <input name="fechaCita" type="date" value="<?php if (isset($_POST['fechaCita'])) {
                                                            echo $_POST['fechaCita'];
                                                        } ?>" /><?= $valida->ImprimirError('fechaCita'); ?>
            <button class="botones" type="submit">Ver horas disponibles</button><br /><br /><br /><br />
            <label>
                <h2>Hora inicio consulta</h2>
            </label>
            <select name="horaInicio" id="horaInicio">
                <?php
                /*foreach ($horas as $key => $value) {
                    $fechaImprimir = new DateTime($value);
                    echo '<option>'.$fechaImprimir->format("H:i").'</option>';
                }*/
                if (isset($_POST['fechaCita'])) {
                    $fecha = $_POST['fechaCita'];
                    $citas = $conexion->getAll('cita');
                    $horas = [];
                    foreach ($citas as $key => $value1) {
                        array_push($horas, $value1->getFechaCita());
                    }

                    $horasOcupadas = [];
                    foreach ($horas as $key => $value2) {
                        $fecha = new DateTime($value2);
                        array_push($horasOcupadas, $fecha->format('H:i'));
                    }

                    $horasFinOcupadas = [];
                    foreach ($citas as $key => $value3) {
                        $duracion = $value3->getDuracion();
                        $duracion = explode(":", $duracion);
                        $fecha = new DateTime($value3->getFechaCita());
                        $fecha->modify("+$duracion[0] hour");
                        $fecha->modify("+$duracion[1] minute");
                        $fecha->modify("+$duracion[2] second");
                        array_push($horasFinOcupadas, $fecha->format('H:i'));
                    }

                    for ($i = 0; $i < count($horasOcupadas); $i++) {
                        $horasOcupadas[$i] = strtotime($horasOcupadas[$i]);
                        $horasFinOcupadas[$i] = strtotime($horasFinOcupadas[$i]);
                    }

                    $hora = '09:00';
                    $horaFin = '20:45';
                    while ($hora < $horaFin) {
                        $horaCita = strtotime($hora);
                        $imprimir = true;
                        for ($i = 0; $i < count($horasOcupadas); $i++) {
                            if ($horaCita >= $horasOcupadas[$i] && $horaCita < $horasFinOcupadas[$i]) {
                                $imprimir = false;
                                break;
                            }
                        }
                        if ($imprimir) {
                            echo "<option value='$hora'>$hora</option>";
                        }
                        $hora = date('H:i', strtotime('+15 minute', strtotime($hora)));
                    }
                }
                ?>
            </select>
            <br /> <br /> <br /> <br />
            <label>
                <h2>Hora fin consulta</h2>
            </label>
            <select name="horaFin" id="horaFin">
                <?php
                /*foreach ($horas as $key => $value) {
                    $fechaImprimir = new DateTime($value);
                    echo '<option>'.$fechaImprimir->format("H:i").'</option>';
                }*/
                if (isset($_POST['fechaCita'])) {
                    $fecha = $_POST['fechaCita'];
                    $horas = [];
                    foreach ($citas as $key => $value1) {
                        array_push($horas, $value1->getFechaCita());
                    }

                    $horasOcupadas = [];
                    foreach ($horas as $key => $value2) {
                        $fecha = new DateTime($value2);
                        array_push($horasOcupadas, $fecha->format('H:i'));
                    }

                    $horasFinOcupadas = [];
                    foreach ($citas as $key => $value3) {
                        $duracion = $value3->getDuracion();
                        $duracion = explode(":", $duracion);
                        $fecha = new DateTime($value3->getFechaCita());
                        $fecha->modify("+$duracion[0] hour");
                        $fecha->modify("+$duracion[1] minute");
                        $fecha->modify("+$duracion[2] second");
                        array_push($horasFinOcupadas, $fecha->format('H:i'));
                    }

                    /*echo '<script> var finCitas = ' . json_encode($horasFinOcupadas) . ';</script>';
                    echo '<script> var diaElegido =' . json_encode($_POST['fechaCita']) . ';</script>';
                    echo '<script> var citas =' . json_encode($horas) . ';</script>';*/

                    for ($i = 0; $i < count($horasOcupadas); $i++) {
                        $horasOcupadas[$i] = strtotime($horasOcupadas[$i]);
                        $horasFinOcupadas[$i] = strtotime($horasFinOcupadas[$i]);
                    }

                    $hora = '09:15';
                    $horaFin = '21:00';
                    while ($hora < $horaFin) {
                        $horaCita = strtotime($hora);
                        $imprimir = true;
                        for ($i = 0; $i < count($horasOcupadas); $i++) {
                            if ($horaCita >= $horasOcupadas[$i] && $horaCita < $horasFinOcupadas[$i]) {
                                $imprimir = false;
                                break;
                            }
                        }
                        if ($imprimir) {
                            echo "<option value='$hora'>$hora</option>";
                        }
                        $hora = date('H:i', strtotime('+15 minute', strtotime($hora)));
                    }
                }
                ?>
            </select>
            <br /> <br /> <br /> <br />
            <h2>Motivos</h2><?= $valida->ImprimirError('motivos'); ?>
            </label><br />
            <textarea name="motivos" cols="40" rows="5"></textarea><br /><br />
            <button id="enviar" type="submit" class="botones" name="submit">Programar</button><label id="error" style="color: red; display: none;">El tramo horario elegido interfiere con otras citas</label>
        </form>
    </div>
    <div class="agendita">
        <script src="./js/script2.js"></script>
        <script src="./js/scriptBuscar.js"></script>
        <p><label hidden>Fecha</label>&nbsp;<input type="date" id="busquedaFecha" value="<?php if (isset($_POST['fechaCita'])) {
                                                                                                echo $_POST['fechaCita'];
                                                                                            } ?>" onchange="doSearchFecha()" hidden></p>
        <br />
        <table id="agenda" class="blueTable">
            <thead>
                <?php
                if ($cliente[0]->getIdrol() == 1) {
                    echo '<th>Cliente</th>';
                }
                ?>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Duracion estimada(Horas:Minutos:Segundos)</th>
                <th>observaciones</th>
                <th>Realizada</th>
            </thead>
            <tbody>
                <?php
                foreach ($citas as $clave => $valor) {
                    $fechaCita = $valor->getFechaCita();
                    $fechaCita = new DateTime($fechaCita);
                    $id = [$valor->getCliente_idusuario()];
                    $usuario = $conexion->findByid('cliente', $id);
                    echo '<tr>';
                    if ($cliente[0]->getIdrol() == 1) {
                        echo '<td>' . $usuario[0]->nombreCompleto() . '</td>';
                    }
                    $fechaImprimir = new DateTime($valor->getFechaCita());
                    echo '<td>' .  $fechaImprimir->format('d-m-Y') . '</td>';
                    echo '<td>' .  $fechaImprimir->format('H:i') . '</td>';
                    echo '<td>' . $valor->getDuracion() . '</td>';
                    echo '<td>' . $valor->getMotivos() . '</td>';
                    $realizada = $valor->getRealizada();
                    if ($realizada == 0) {
                        echo '<td><img  height="20px" width="20px" src="./css/imagenes/ic_not_black_48dp.png"></td>';
                    } else {
                        echo '<td><img  height="20px" width="20px" src="./css/imagenes/ic_yes_black_48dp.png"></td>';
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>