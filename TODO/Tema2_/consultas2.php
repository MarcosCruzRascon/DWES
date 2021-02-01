<?php
    $dwes = new mysqli("localhost", "dwes", "abc123.", "dwes");
    $error = $dwes->connect_errno;

    if ($error != null)
    {
        print "<p>Se ha producido el error: $dwes->connect_error.</p>";
        exit();
    }

    $consulta = $dwes->stmt_init();
    $consulta->prepare('SELECT producto, unidades FROM stock WHERE unidades<?');

    $cantidadUnidad = 2;

    $consulta->bind_param('i', $cantidadUnidad);

    $consulta->execute();
    $consulta->bind_result($producto, $unidades);
    
    while($consulta->fetch())
    {
        print "<p>Producto $producto: $unidades unidades.</p>";
    }

    $consulta->close();
    $dwes->close();
?>