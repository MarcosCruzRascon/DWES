<?php
class Principal
{
    public static function main()
    {
        require_once './cargadores/cargaclases.php';
        require_once './cargadores/cargaherlper.php';
        //require_once './helper/sesion.php';
        require_once './Vistas/Principal/layout.php';
    }
}
    Principal::main();
?>
