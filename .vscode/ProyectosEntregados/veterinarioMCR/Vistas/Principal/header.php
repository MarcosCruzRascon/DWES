<header>
    <?php
    $conexion = new GBD("localhost", "veterinariomcr", "root", "");
    $sesion = new Sesion();
    $sesion::iniciar();
    date_default_timezone_set('Europe/Madrid');

    ?>
    <link rel="stylesheet" href="./css/screen.css">
    <div class="titulo">
        <img src="./css/imagenes/logo.jpg" width="100px" height="100px">
        <h1>Veterinaria Cuidaditos</h1>
    </div>
    <nav>
        <ul>
            <li class="categoria">
                <a href="?menu=inicio">Inicio</a>
            </li>
            <?php
            $usuario = $sesion::leer("usuario");
            if (!empty($usuario)) {
                echo
                    '<li class="categoria">
                        <a>Listado</a>
                        <ul class="submenu">
                            <li><a href="?menu=listadoanimales">Animales</a></li>
                            <li><a href="?menu=listadovacunas">Vacunas</a></li>';

                if ($usuario[0]->getIdrol() == 1) {
                    echo '<li><a href="?menu=listadoclientes">Clientes</a></li>';
                }
                echo '</ul>
                    </li>
                    <li class="categoria">
                    <a href="?menu=agenda">Agenda</a>
                </li>';
                if ($usuario[0]->getIdrol() == 1) {
                    echo '<li class="categoria">
                    <a>Mantenimiento</a>
                    <ul class="submenu">
                        <li><a href="?menu=nuevoCliente">Nuevo cliente</a></li>
                        <li><a href="?menu=nuevaMascota">Nueva Mascota</a></li>
                    </ul>
                    </li>
                    <li class="categoria">
                    <a>Cita/Visita</a>
                    <ul class="submenu">
                        <li><a href="?menu=nuevaCita">Nueva cita</a></li>
                        <li><a href="?menu=nuevaVisita">Nueva visita</a></li>
                    </ul>
                    </li>';
                }
                echo
                    '<div class="topnav">
                            <label class="hola">Hola ' . $usuario[0]->getNombre() . '</label>
                            <a href="?menu=logout">Logout</a>
                    </div>';
            } else {
                echo
                    '<div class="topnav">
                            <a href="?menu=login">Login</a>
                        </div>';
            }
            ?>
            </li>
        </ul>
    </nav>
</header>