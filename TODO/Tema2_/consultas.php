<?php
    /*$dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');

    //Miro si ha habido erros en la conexion
    $error = $dwes->connect_errno;

    //Si no hay error, al ser null haria la conexion
    if ($error == null)
    {
        //$resultado = $dwes->query('DELETE FROM stock WHERE unidades = 0');

        $resultado = $dwes->query('UPDATE stock SET unidades=unidades+1 WHERE unidades > 8');

        if ($resultado)
        {
            //affected_rows --> nos dice la cantidad de filas que ejecutado
            print "<p>Se han actualizado  $dwes->affected_rows registros.</p>";
            //print "<p>Se han borrado $dwes->affected_rows registros.</p>";
        }

    $dwes->close();
    }*/
?>

<?php
    /*$dwes = new mysqli("localhost", "dwes", "abc123.", "dwes");
    $error = $dwes->connect_errno;
    
    if ($error != null)
    {
        print "<p>Se ha producido el error: $dwes->connect_error.</p>";
        exit();
    }

    // Definimos una variable para comprobar la ejecución de las consultas
    $todo_bien = true;
    
    // Iniciamos la transacción
    $dwes->autocommit(false);
    $sql = 'UPDATE stock SET unidades=1 WHERE producto="3DSNG" AND tienda=1';
    
    if ($dwes->query($sql) != true) $todo_bien = false;
    $sql = 'INSERT INTO `stock` (`producto`, `tienda`, `unidades`) VALUES ("3DSNG", 3, 1)';
    
    if ($dwes->query($sql) != true) $todo_bien = false;
    
    // Si todo fue bien, confirmamos los cambios
    // y en caso contrario los deshacemos
    if ($todo_bien == true)
    {
        $dwes->commit();
        print "<p>Los cambios se han realizado correctamente.</p>";
    }
    else
    {
        $dwes->rollback();
        print "<p>No se han podido realizar los cambios.</p>";
    }
    
    $dwes->close();
    unset($dwes);*/
?>

<?php
   /* $dwes = new mysqli("localhost", "dwes", "abc123.", "dwes");
    $error = $dwes->connect_errno;
    
    if ($error != null)
    {
        print "<p>Se ha producido el error: $dwes->connect_error.</p>";
        exit();
    }

    $resultado = $dwes->query('SELECT producto, unidades FROM stock WHERE unidades<2');
    //Esta instrucion es para ver si la consulta devulve algo
    $stock = $resultado->fetch_object();
    
    while ($stock != null) {
    
            print "<p>Producto $stock->producto: $stock->unidades unidades.</p>";
        //Esta funcion es para ver que pase a la siguente lectura del objeto para ver si es null o no
            $stock = $resultado->fetch_object();
    
    }*/
?>

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
            $resultado = $dwes->query('SELECT * FROM stock WHERE producto = "OPTIOLS1100"');

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