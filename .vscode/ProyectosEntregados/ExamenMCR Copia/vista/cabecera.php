<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabecera</title>
    <link rel="stylesheet" href="estiloCabecera.css">
</head>
<?php
    session_start();
?>

<body>

    <div class="header">
        <img src="imagenes/junta.png" width="15%" height="90%">
        <h1>Portal examenes</h1>
    </div>

    <?php
    if (isset($_SESSION['usuario'])) {
        echo
            "<div class='topnav'>
                <a href='../controlador/unlogin_controller.php'>Logout</a>
            </div>";
    } else {
        echo
            "<div class='topnav'>
                <a href='login.php'>Login</a>
            </div>";
    }
    ?>


</body>

</html>