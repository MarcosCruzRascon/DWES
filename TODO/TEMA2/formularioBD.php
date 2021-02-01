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
    @$dwes = new mysqli("localhost", "dwes", "abc123.", "dwes", 3306);
    $error = $dwes->connect_errno;
    if ($error != null) {
        print "<p>Se ha producido el error: $dwes->connect_error.</p>";
        exit();
    }
    $resultado = $dwes->query('SELECT * FROM stock WHERE unidades<2');

    $stock = $resultado->fetch_object();
    
        print "<p>Producto $stock->producto: $stock->unidades: $stock->tienda .</p>";
    
    ?>
</head>

<body>
    <form name="input" method="post" action="formularioBD.php">
        <input type="text" name="producto" value=<?php echo $stock->producto ?> /> Producto<br />
        <input type="text" name="unidades" value=<?php echo $stock->unidades ?> /> Unidades<br />
        <input type="text" name="tienda" value=<?php echo $stock->tienda ?> /> Tienda<br />
        <input type="submit" value="Enviar" />
        <br />
    </form>
</body>

</html>