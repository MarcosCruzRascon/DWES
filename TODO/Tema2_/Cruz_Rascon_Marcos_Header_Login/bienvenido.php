<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina Principal</title>
        <?php
            require "baseDatos.inc.php";
        ?>

    </head>
    <body>


        <?php
            
            $user = $_GET['user'];

            echo "<h1>Bienvenido a la pagina web ".$user."<h4><br/>";

            $arrayTelefonosUsuario = telefonosUsuario($user);

            foreach ($arrayTelefonosUsuario as $key) 
            {
                echo $key[0]."<br/>";
            }

        ?>


    </body>
</html>