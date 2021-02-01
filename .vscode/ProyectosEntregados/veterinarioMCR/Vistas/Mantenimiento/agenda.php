<body>
    <link rel="stylesheet" href="./css/estilos.css">
    <?php
    $cliente = $sesion::leer('usuario');
    if (!empty($cliente)) {
        $rolUsuario = $cliente[0]->getIdrol();

        if ($cliente[0]->getIdrol() == 1) {
            $citas = $conexion->getAll('cita');
        } else {
            $id = $cliente[0]->getIdUsuario();
            $array = ['cliente_idusuario' => $id];
            $citas = $conexion->findByOne('cita', $array);
        }
    } else {
        header("location:?menu=login");
    }
    ?>
    <script src="./js/script2.js"></script>
    <script src="./js/scriptBuscar.js"></script>
    <p><label>Fecha</label>&nbsp;<input type="date" id="busquedaFecha" onchange="doSearchFecha()"></p>
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
            <th>Acciones</th>
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

                echo '<td>';
                $fechaAhora = new DateTime();
                $fechaAhora = $fechaAhora->format('Y-m-d 00:00:00');
                $fechaAhora = new DateTime($fechaAhora);
                $fechaComparar = new DateTime($valor->getFechaCita());
                if ($cliente[0]->getIdrol() == 1) {
                    $fechaAyer = new DateTime('yesterday');
                    $fechaAyer = $fechaAyer->format('Y-m-d 23:59:59');
                    $fechaAyer = new DateTime($fechaAyer);
                    $fechaPosterior = new DateTime("tomorrow");
                    /*$compro1 = $fechaComparar > $fechaAhora;
                    $compro2 = $fechaComparar < $fechaPosterior;*/
                    if ($fechaComparar > $fechaAhora && $fechaComparar < $fechaPosterior) {
                        if (!$valor->getRealizada()) {
                            echo '<a href="?menu=nuevaVisita&select=' . $usuario[0]->getIdusuario() . '&numeroCita=' . $valor->getIdCita() . '" class="botones" id="realizar">Realizar</a>';
                        }
                    }
                }
                if ($fechaComparar > $fechaAhora) {
                    if (!$valor->getRealizada()) {
                        echo '<a class="botones" href="?menu=borrarCita&id=' . $valor->getIdCita() . '" id="cancelar">Cancelar</a></td>';
                    }
                }

                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>