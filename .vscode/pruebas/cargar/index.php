<?php

require "./cargadores/cargarclases.php";
require "./cargadores/cargarhelper.php";
// require "./Clases/persona.php";
// require "./helper/funciones.php";
$p = new Persona();
$p->setNombre("Manolo");
echo "hola ".Funciones::mayusculas($p->getNombre());
echo "<br>";
$m = new Mascota();
$m->setNombre("Perrico");
echo "hola ".Funciones::mayusculas($m->getNombre());

