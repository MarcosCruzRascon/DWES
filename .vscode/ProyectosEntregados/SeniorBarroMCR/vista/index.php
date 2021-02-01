<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Inicio</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <div class="cabecera">
            <?php
            include "cabeceraIndex.php";
            ?>
        </div>
    </header>
    <div class="cuerpo">
        <div class="presentacion">
            <h3>¿Quiénes somos?</h3>

            <p class="introduccion">Señor Barro S.L. es una sociedad encargada de ayudarle en su búsqueda de la felicidad.
                Fue fundada en 1966 por el antecesor de nuestro actual director y guía Señor Barro Jr.
                Desde el primer momento nos hemos preocupado por ayudar en su bienestar y el de miles de personas que día a día contactan con nosotros.
                Nuestros métodos le ayudaran a ser mejor en su día a día y definitivamente ser feliz.</p>
        </div>


        <div class="contacto">
            <h3>Datos de contacto</h3>
            <p>
                Telefono: 617772169<br />
                Correo: seniorbarrosl@gmail.com<br />
                Twitter: seniorbarro<br />
            </p>
        </div>

        <div class="cita">
            <form action="pedirCita.php">
                <button class="boton" type="submit">Pedir Cita</button>
            </form>
        </div>

    </div>

</body>

</html>