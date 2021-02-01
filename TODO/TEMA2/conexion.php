<?php
/*$conexion =  new mysqli('localhost', 'dwes', 'abc123.', 'dwes');

print $conexion->server_info;*/

/*@ $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');

$error = $dwes->connect_errno;

if ($error != null) {

    echo "<p>Error $error conectando a la base de datos: $dwes->connect_error</p>";

    exit();
}
else
{
    echo "<p>GG</p>";
    $dwes->close();
    
}*/


@ $dwes = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');

$error = $dwes->connect_errno;

if ($error == null) {

    $resultado = $dwes->query('UPDATE FROM stock set unidades=unidades+1 WHERE unidades>=3');

    if ($resultado) {

        print "<p>Se han borrado $dwes->affected_rows registros.</p>";

    }
    
    $dwes->close();

}