<?php

function mañanaTarde($hora){

    $a = date("G", strtotime($hora));
    if($a>=0 && $a<=12)
    {
        return $dia="mañana";

    }
    elseif($a>12 || $a<24)
    {
        return $dia="noche";
    }


    function estaciones($fecha)
    {
        $mesActual  = date('n',strtotime($fecha));
        $diaActual = date('d',strtotime($fecha));
        $primavera  = array(3,4,5);
        $verano     = array(6,7,8); 
        $otono      = array(9,10,11);
        $invierno   = array(12,1,2); 

        if ( in_array( $mesActual, $primavera ) ) {
            return $epoca="primavera";
     
        } elseif ( in_array( $mesActual, $verano ) ) {
            return $epoca="verano";
     
        } elseif ( in_array( $mesActual, $otono ) ) {
            return $epoca="otoño";
     
        } else {
            return $epoca="invierno";
        }

       
    }
}
?>