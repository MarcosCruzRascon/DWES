<?php
        $users = array (
            "juan" => "juan",
            "pedro" => "pedro",
            "mari" => "maria"
        );

        if(!empty($_POST['usuario']) && !empty($_POST['contrasenia']))
        {
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['contrasenia'];

            $usuarioCorrecto = array_search($contrasenia, $users);

            if($usuarioCorrecto == $usuario)
            {
                print "Bienvenido ".$usuario;
            }
            else
            {
                print "Los datos introducidos no son correctos";
            }
        }
        else
        {
            print "Existen datos sin completar";    
        }

?>