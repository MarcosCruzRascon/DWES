<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once 'index.php';
    }
    if ($_GET['menu'] == "login") {
        require_once './Vistas/Login/autentifica.php';
    }
    if ($_GET['menu'] == "agenda") {
        require_once './Vistas/mantenimiento/agenda.php';
     
    }
    if ($_GET['menu'] == "nuevaCita") {
        require_once './Vistas/gestiones/nuevaCita.php';
     
    }
    if ($_GET['menu'] == "nuevoCliente") {
        require_once './Vistas/Gestiones/nuevoCliente.php';
     
    }
    if ($_GET['menu'] == "nuevaMascota") {
        require_once './Vistas/gestiones/nuevaMascota.php';
     
    }
    if ($_GET['menu'] == "nuevaVisita") {
        require_once './Vistas/gestiones/nuevaVisita.php';
     
    }
    if ($_GET['menu'] == "listadoanimales") {
        require_once './Vistas/Mantenimiento/listadoanimales.php';
     
    }
    if ($_GET['menu'] == "borrarCita") {
        require_once './Vistas/gestiones/borrarCita.php';
     
    }
   if ($_GET['menu'] == "listadoclientes") {
        require_once './Vistas/Mantenimiento/listadoclientes.php';
     
    }
    if ($_GET['menu'] == "listadovacunas") {
        require_once './Vistas/Mantenimiento/listadovacunas.php';
     
    }
    if ($_GET['menu'] == "generapdf") {
        require_once './helper/generaPDF.php';
     
    }
    if ($_GET['menu'] == "editarmascota") {
        require_once './Vistas/Mantenimiento/editarMascota.php';
     
    }
    if ($_GET['menu'] == "editarcliente") {
        require_once './Vistas/Mantenimiento/editarCliente.php';
     
    }
    
    if ($_GET['menu'] == "logout") {
        require_once './Vistas/Login/cerrarsesion.php';
     
    }
} 
    //Añadir otras rutas
