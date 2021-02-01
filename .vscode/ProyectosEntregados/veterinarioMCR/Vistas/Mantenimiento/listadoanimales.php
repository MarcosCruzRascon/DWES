<body>
    <?php
    $cliente = $sesion::leer('usuario');
    if (!empty($cliente)) {
        $rolUsuario = $cliente[0]->getIdrol();

        if ($rolUsuario == 1) {
            $animales = $conexion->getAll('mascota');
            if(isset($_GET['borrar']))
            {
                $idMascota = $_GET['borrar'];
                $array = [$idMascota];
                try {
                    $tabla = $conexion->delete('mascota', $array);
                    header("location:?menu=listadoanimales");
                } catch (\Throwable $th) {
                    $valida->setError('add', 'Error al borrar mascota');
                }
                 
            }
        } else {
            $id = $cliente[0]->getIdUsuario();
            $array = ['cliente_idusuario' => $id];
            $animales = $conexion->findByOne('mascota', $array);
        }
    } else {
        header("location:?menu=login");
    }
    ?>
    <script src="./js/scriptBuscar.js"></script>
    <button id="convierte" class="botones" >Imprimir informe</button>
    <br/><br/>
    <p><label>Buscar</label>&nbsp;<input type="text" id="busqueda" onkeyup="doSearch()"></p>
    <br />
    <div id="imprimir">
    <table id="animales" class="blueTable">
    <link rel="stylesheet" href="./css/estilos.css">
        <thead>
            <th>Nº Expediente</th>
            <th>Nombre</th>
            <th>Fecha Nacimiento</th>
            <th>Especie</th>
            <th>Genero</th>
            <?php
            if ($cliente[0]->getIdrol() == 1) {
                echo '<th>Dueño</th>';
                echo '<th>Acciones</th>';
            }
            ?>

        </thead>
        <tbody>
            <?php
            foreach ($animales as $clave => $valor) {
                $fechaNacimiento = $valor->getFechaNacimiento();
                $idDuenioMascota = $valor->getCliente_idusuario();
                $array = [$idDuenioMascota];
                $duenioMascota = $conexion->findById('cliente', $array);
                echo '<tr>';
                echo '<td>' .  $valor->getNumeroExpediente() . '</td>';
                echo '<td>' .   $valor->getNombre() . '</td>';
                echo '<td>' . $fechaNacimiento . '</td>';
                $especie = $conexion->getAll('especie');
                foreach ($especie as $key => $value) {
                    if ($valor->getIdEspecie() == $value->getIdEspecie())
                        echo '<td>' . $value->getNombre() . '</td>';
                };
                $genero = $conexion->getAll('genero');
                foreach ($genero as $key => $value) {
                    if ($valor->getGenero() == $value->getGenero())
                        echo '<td>' . $value->getDescripcion() . '</td>';
                };
                if ($cliente[0]->getIdrol() == 1) {
                    echo '<td>' . $duenioMascota[0]->nombreCompleto() . '</td>';
                };
                if ($cliente[0]->getIdrol() == 1) {
                    echo '<td><a class="botones" href="?menu=editarmascota&numExp='.$valor->getNumeroExpediente().'">Editar</a>
                    <a class="botones" href="?menu=listadoanimales&borrar='.$valor->getNumeroExpediente().'">Borrar</a>
                    </td>';
                };
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
