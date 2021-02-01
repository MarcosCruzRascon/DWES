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
    <form class="login" name="input" action="../control/procesoRegistro.php" method="post">
        Nombre:
        <input type="text" name="usuario" /><br />
        Primer Apellido:
        <input type="text" name="apellido1" /><br />
        Segundo Apellido:
        <input type="text" name="apellido2" /><br />
        Telefono:
        <input type="text" name="telefono" /><br />
        Correo:
        <input type="text" name="correo" /><br />
        Contraseña:
        <input type="text" name="contrasenia" /><br />
        <a href="login.php">¿Ya tienes cuenta?Inicia Sesion</a>
        <input type="submit" value="Enviar" name="enviar" />
</body>

</html>