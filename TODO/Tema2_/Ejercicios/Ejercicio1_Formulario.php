<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina Principal</title>

    </head>
    <body>

        <form name="input" action="Ejercicio1.php" method="get">

                <fieldset>
                    <legend><b>Datos personales</b></legend>
                        <p><label for="producto">Producto </label>
                        <input type="text" name="producto" />
                        </p>

                       <!--  <p><label for="tienda">Tienda </label>
                        <input type="text" name="tienda" />
                        </p>

                        <p><label for="unidades">Unidades </label>
                        <input type="text" name="unidades"/>
                        </p> -->
                </fieldset>

            
                <input type="submit" value="Enviar" name="enviar"/>
                <input type="reset">
        </form>
    
    </body>
</html>