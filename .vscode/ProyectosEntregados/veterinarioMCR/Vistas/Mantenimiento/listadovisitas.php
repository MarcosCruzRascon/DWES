<body>
    <script src="./js/scriptBuscar.js"></script>
    <button id="convierte" class="botones">Imprimir informe</button>
    <br /><br />
    <p><label>Buscar</label>&nbsp;<input type="text" id="busqueda" onkeyup="doSearchClientes()"></p>
    <br />
    <div id="imprimir">
        <table id="clientes" class="blueTable">
            <thead>
                <th>Nombre</th>
            </thead>
            <tbody>
                <?php
                $arrayClientes = $conexion->getAll('cliente');
                foreach ($arrayClientes as $clave => $valor) {
                    if ($valor->getIdrol() != 1) {
                        $idusuario = $valor->getIdusuario();
                        echo '<tr>';
                        echo '<td>' .  $valor->nombreCompleto() . '</td>';
                        echo '</tr>';
                    }
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