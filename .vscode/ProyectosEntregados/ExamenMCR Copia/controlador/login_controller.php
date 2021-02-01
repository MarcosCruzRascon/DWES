<?php
    include_once './gbd.php';
    include_once '../modelo/usuario.php';
    include_once '../modelo/examen.php';
    $nombre=$_POST['usuario'];
    $passwd=$_POST['password'];
    $codigo=$_POST['cod'];
    date_default_timezone_set('Europe/Madrid');
    $usuario=new usuario;
    $usuario->setIdusuario($nombre);
    $usuario->setPassword($passwd);

    $examen = new examen;
    $examen->setCodExamen($codigo);

    if(comprobarLogin($usuario))
    {
        if(examenExiste($codigo))
        {
            session_start();
            $fecha=new DateTime();
            $_SESSION['horaInicio']=$fecha->format('Y-m-d H:i:s');
            $examenRealizar=obtieneInfoExamen($examen);
            $fechaInicioExamen=$examenRealizar->getFechaInicio();
            $fechaFinExamen=$examenRealizar->getFechaFin();
            $usuarioFinal=obtieneUsuario($nombre);
            $_SESSION['usuario']=$usuarioFinal;
            $_SESSION['codExamen']=$codigo;


            if(!examenRealizado($usuarioFinal, $examen))
            {
                if ($fecha>=$fechaInicioExamen && $fecha<=$fechaFinExamen)
                {
                    header("Location:../vista/examen.php");
                }
                else if($fecha>$fechaInicioExamen)
                {
                    header("Location:../vista/noHora.php?pasado=1"); 
                }
                else
                {
                    header("Location:../vista/noHora.php"); 
                }
            }
            else
            {
                header("Location:examen_controller.php?re=0");
            }
      
        }
        else
        {
            header("Location:../vista/login.php?cod=invalid"); 
        }
            
    }
    else
    {
        header("Location:../vista/login.php?user=invalid");
    }
?>