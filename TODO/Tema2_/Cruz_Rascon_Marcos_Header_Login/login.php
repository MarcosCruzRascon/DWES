<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina Login</title>

    </head>
    <body>
        
        <h1>Login</h1>
        <form method="post" action="login_procesar.php" >
                <input type="text" name="usuario" placeholder="Usuario" required="required" />
                <input type="password" name="passwd" placeholder="Contraseña" required="required" />
                <button type="submit">Iniciar Sesion</button>
        </form>
    </body>
</html>