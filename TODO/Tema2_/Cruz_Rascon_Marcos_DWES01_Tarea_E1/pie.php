<?php
if (isset($_GET['enviar']) && !empty($_GET['nombre']) && !empty($_GET['email']) && !empty($_GET['telefono'])
&& !empty($_GET['webPreferida']) && !empty($_GET['fechaNacimiento']) && !empty($_GET['sexo']) && validaNombre($_GET['nombre']) 
&& validaEmail($_GET['email']) && validaTelefono($_GET['telefono']) && validaWeb($_GET['webPreferida']) && validaSueldos($_GET['sueldoActual'])
&& validaSueldos($_GET['sueldoDeseado'])) 
{
    $nombre=$_GET['nombre'];
    $email=$_GET['email'];
    $telefono=$_GET['telefono'];
    $web=$_GET['webPreferida'];
    $anios=$_GET['fechaNacimiento'];
    $sexo=$_GET['sexo'];
    $html=$_GET['html'];
    $mysql=$_GET['mysql'];
    $ingles=$_GET['ingles'];
    $php=$_GET['php'];
    $js=$_GET['js'];
   
    $sueldoActual=$_GET['sueldoActual'];
    $sueldoFuturo=$_GET['sueldoDeseado'];

    $articulo;
    if($sexo=="hombre")
    {
        $articulo="un";
    }
    else
    {
        $articulo="una";
    }
    
    $edad=calculaedad($anios);

    print "<p></p>".$nombre." es ".$articulo." ".$sexo." con ".$edad." años."."<br/>Le gusta navegar por la web ".$web.".<br/>";

    if(!empty($_GET['modulos1']))
    {
        $modulos1=$_GET['modulos1'];
        $modulosPrimero = implode(", ",$modulos1);
        $modulosPrimeroImprimir="De 1º de DAW tiene aprobados los ciclos de ".$modulosPrimero."<br/>";
        print $modulosPrimeroImprimir;
    }
    else
    {
        $modulos1=null;
        print "No tiene modulos aprobados de 1º.<br/>";
    }

    if(!empty($_GET['modulos2']))
    {
        $modulos2=$_GET['modulos2'];
        $modulosSegundo = implode(", ",$modulos2);
        $modulosSegundoImprimir="De 2º de DAW tiene aprobados los ciclos de ".$modulosSegundo."<br/>";
        print $modulosSegundoImprimir;
    }
    else
    {
        $modulos2=null;
        print "No tiene modulos aprobados de 2º.<br/>";
    }
    
    $conocimientoNotables=[];
    if($html>5)
    {
        array_push($conocimientoNotables,"html");
    }

    if($mysql>5)
    {
        array_push($conocimientoNotables,"mysql");
    }

    if($ingles>5)
    {
        array_push($conocimientoNotables,"ingles");
    }

    if($php>5)
    {
        array_push($conocimientoNotables,"php");
    }

    if($js>5)
    {
        array_push($conocimientoNotables,"javascript");
    }
    if(!empty($conocimientoNotables))
    {
        $conocimientoImprimir  = implode(", ",$conocimientoNotables);
        print "Posee conocimientos notables de ".$conocimientoImprimir.".<br/>";
    }

    
    if(!empty($_GET['experiencia']))
    {
        $experiencia=$_GET['experiencia'];
        $experiencia=explode("\n",$experiencia);
        $experienciaImprimir  = implode(", ",$experiencia);
        print  "Tiene una experiencia laboral en ".$experienciaImprimir."<br/>";

    }

    print "Su sueldo actual es de ".$sueldoActual."€"." aunque le gustaria llegar a cobrar ".$sueldoFuturo."€";
}
?>
