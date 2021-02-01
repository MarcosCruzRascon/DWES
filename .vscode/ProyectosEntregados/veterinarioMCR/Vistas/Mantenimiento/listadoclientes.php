<body>
<?php
    $cliente = $sesion::leer('usuario');
    if (!empty($cliente)) {
        $rolUsuario = $cliente[0]->getIdrol();
        if ($rolUsuario == 1) 
        {
            if(isset($_GET['borrar']))
            {
                $idcliente = $_GET['borrar'];
                $array = [$idcliente];
                try {
                    $tabla = $conexion->delete('cliente', $array);
                    header("location:?menu=listadoclientes");
                } catch (\Throwable $th) {
                    $valida->setError('add', 'Error al borrar el cliente');
                } 
            }
        }
        else{

            header("location:?menu=login");
        }
    } else 
    {
        header("location:?menu=login");
    }
    ?>
    <script src="./js/scriptBuscar.js"></script>
    <button id="convierte" class="botones">Imprimir informe</button>
    <br /><br />
    <p><label>Buscar</label>&nbsp;<input type="text" id="busqueda" onkeyup="doSearchClientes()"></p>
    <br />
    <div id="imprimir">
        <table id="clientes" class="blueTable">
            <thead>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php
                $arrayClientes = $conexion->getAll('cliente');
                foreach ($arrayClientes as $clave => $valor) {
                    if ($valor->getIdrol() != 1) {
                        $idusuario = $valor->getIdusuario();
                        echo '<tr>';
                        echo '<td>' .  $valor->nombreCompleto() . '</td>';
                        echo '<td>' .  $valor->getDni() . '</td>';
                        echo '<td>' .  $valor->getCorreo() . '</td>';
                        echo '<td>' .  $valor->getTelefono() . '</td>';
                        echo '<td><a class="botones" href="?menu=editarcliente&idcliente='.$valor->getIdusuario().'">Editar</a>
                        <a class="botones" href="?menu=listadoclientes&borrar='.$valor->getIdusuario().'">Borrar</a>
                        </td>';
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