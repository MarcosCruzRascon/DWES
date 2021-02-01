<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina Principal</title>
    </head>
    <body>
        <?php
            $dwes = new mysqli("localhost", "dwes", "abc123.", "dwes");
            $error = $dwes->connect_errno;
            
            if ($error != null)
            {
                print "<p>Se ha producido el error: $dwes->connect_error.</p>";
                exit();
            }

            $producto = $_GET['producto'];;
            $resultado = $dwes->query("SELECT * FROM stock WHERE producto = '".$producto."'");

            //Esta instrucion es para ver si la consulta devulve algo
            $stock = $resultado->fetch_object();

            print "<p>Producto $stock->producto: $stock->unidades (unidades): $stock->tienda (tienda).</p>";
        ?>

        <form name="input" >
            <p><label for="producto">Producto </label>
            <input type="text" name="producto" value="<?php echo $stock->producto;?>" />
            </p>

            <p><label for="tienda">Tienda </label>
            <input type="text" name="tienda" value="<?php echo $stock->tienda;?>" />
            </p>

            <p><label for="unidades">Unidades </label>
            <input type="text" name="unidades" value="<?php echo $stock->unidades;?>" />
            </p>
        <form>
    </body>
</html>