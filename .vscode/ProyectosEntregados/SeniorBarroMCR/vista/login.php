<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <div class="cabecera">
            <?php
            include "cabecera.php";
            ?>
        </div>
    </header>
    <form class="login" name="input" action="../control/procesoLogin.php" method="post">
        Correo:
        <input type="text" name="usuario" /><br />
        Contraseña:
        <input type="text" name="contrasenia" /><br />
        <a class="registrate" href="login.php">¿No tienes cuenta?Registrate</a>
        <input type="submit" value="Enviar" name="enviar" />
</body>

</html>