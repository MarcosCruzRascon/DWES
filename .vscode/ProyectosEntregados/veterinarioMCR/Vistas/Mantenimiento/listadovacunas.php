<body>
    <?php
    $cliente = $sesion::leer('usuario');
    if (!empty($cliente)) {
        $rolUsuario = $cliente[0]->getIdrol();

        if ($rolUsuario == 1) {
            $vacunas = $conexion->getAll('cartillavacunacion');
        } else {
            $duenio = ['cliente_idusuario' => $cliente[0]->getIdUsuario()];
            $animalesUsuario = $conexion->findByOne('mascota', $duenio);
            foreach ($animalesUsuario as $key => $valor) {
                $array = ['mascota_numeroExpediente' => $valor->getNumeroExpediente()];
            }
            $vacunas = $conexion->findByOne('cartillavacunacion', $array);
        }
    } else {
        header("location:?menu=login");
    }
    ?>
    <script src="./js/scriptBuscar.js"></script>
    <button id="convierte" class="botones">Imprimir informe</button>
    <br /><br />
    <p><label>Buscar</label>&nbsp;<input type="text" id="busqueda" onkeyup="doSearch()"></p>
    <br />
    <div id="imprimir">
        <table id="animales" class="blueTable">
            <thead>
                <th>Nombre de la mascota</th>
                <th>Fecha Vacunacion</th>
                <th>Observaciones</th>
                <th>Vacuna</th>
                <?php
                if ($rolUsuario == 1) {
                    echo "<th>Dueño</th>";
                }
                ?>
            </thead>
            <tbody>
                <?php
                foreach ($vacunas as $clave => $valor) {
                    $fechaVacunacion = $valor->getFechaVacunacion();
                    $idMascota = $valor->getMascota_numeroExpediente();
                    $busqueda = [$idMascota];
                    $infoMascota = $conexion->findById('mascota', $busqueda);
                    $idVacuna = [$valor->getVacunas_idVacuna()];
                    $vacuna = $conexion->findById('vacunas', $idVacuna);
                    echo '<tr>';
                    echo '<td>' . $infoMascota[0]->getNombre() . '</td>';
                    echo '<td>' . $fechaVacunacion . '</td>';
                    echo '<td>' . $valor->getObservaciones() . '</td>';
                    echo '<td>' . $vacuna[0]->getNombre() . '</td>';
                    if ($rolUsuario == 1) {

                        $idDuenio = [$infoMascota[0]->getCliente_idusuario()];
                        $duenio = $conexion->findById('cliente', $idDuenio);
                        echo '<td>' . $duenio[0]->nombreCompleto() . '</td>';
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <form method="post" action="?menu=generapdf">
        <textarea maxlength="99999999999" name="impresion" type="text" id="texto" hidden></textarea>
        <button type="submit" id="enviar" hidden></button>
    </form>
</body>