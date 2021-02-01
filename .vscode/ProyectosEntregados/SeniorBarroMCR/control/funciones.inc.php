<?php
require_once "../control/GBD.inc.php";

function horasLibre($fecha)
{
    $arrayHoras = [];
    $resultado=[];
    $arrayHorasOcupadas=[];

    $date = date_create("$fecha 9:30:00");
    //echo date_format($date, "Y/m/d H:i:s");

    for ($i = 10; $i < 31; $i++) {
        $horas = date_add($date, date_interval_create_from_date_string("30 minutes"));
        array_push($arrayHoras, $horas->format("H:i"));
    }

    $horasOcupadas = horasOcupadasCita($fecha);

    foreach ($horasOcupadas as $value) {
        array_push($arrayHorasOcupadas, $value[0]);
    }

    $resultado = array_diff($arrayHoras, $arrayHorasOcupadas);

    return $resultado;

}



