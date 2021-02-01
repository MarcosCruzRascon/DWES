<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "pantalla1") {
        require_once './Vistas/Mantenimiento/pantalla1.php';
    }
    if ($_GET['menu'] == "pantalla2") {
        require_once './Vistas/Mantenimiento/pantalla2.php';
    }
    if ($_GET['menu'] == "pantalla3") {
        require_once './Vistas/Mantenimiento/pantalla3.php';
    }
}