<?php
function validaNombre($nombre)
{
    $bueno = preg_match("/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/", $nombre);
    if ($bueno == 1) {
        return true;
    } else {
        return false;
    }
}

function validaEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        return true;
    }
}

function validaTelefono($telefono)
{
    $bueno = preg_match("/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/",$telefono);
    if($bueno==1)
    {
        return true;
    }
}

function validaWeb($web)
{
    if (filter_var($web, FILTER_VALIDATE_URL)) 
    {
        return true;
    }
}

function validaSueldos($sueldo)
{
    $bueno = preg_match("/^[\d]{0,11}(\.[\d]{1,2})?($|€)/",$sueldo);
    if($bueno==1)
    {
        return true;
    }
}

function calculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}

