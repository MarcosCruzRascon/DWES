<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Formulario web -->
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Formulario web</title>
    <?php

    

    $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
    $consulta = $dwes->stmt_init();
    $consulta->prepare('SELECT producto, unidades FROM stock WHERE unidades<?');
    $consulta->bind_param('i', $_POST["parametro"]);
    $consulta->execute();
    $consulta->bind_result($producto, $unidades);
    while ($consulta->fetch()) {
        print "<p>Producto $producto: $unidades unidades.</p>";
    }
    $consulta->close();
    $dwes->close();
?>
</head>

<body>
    <form name="input" method="post" action="consultaPreparada.php">
        <input type="text" name="parametro" ?> Parametro<br />
        <input type="submit" value="Enviar" />
        <br />
    </form>
</body>

</html>