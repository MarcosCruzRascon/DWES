<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <?php
        if(isset($_POST['nombre']) && isset($_POST['modulos']))
        {
            if(!empty($_POST['nombre']) && !empty($_POST['modulos']))
            {
                $nombre = $_POST['nombre'];
                $modulos = $_POST['modulos'];
                print "Nombre: ".$nombre."<br />";
                foreach($modulos as $modulo){
                print "Modulo: ".$modulo."<br />";
                }
            }
            elseif(empty($_POST['nombre']))
            {
                print "Rellena el nombre";
            }
            elseif(empty($_POST['modulos']))
            {
                print "Rellena algun modulo cursado";
            }
            
        }
        else
        {
            print "Entra primero al formulario";
        }

    ?>
    
</body>
</html>