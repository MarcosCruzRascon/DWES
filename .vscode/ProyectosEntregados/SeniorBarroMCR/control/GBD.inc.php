<?php
    
    require_once "conexion.php";
   
    function datos($nombre)
    {
        try 
        {
            $conexion = connectDB();
            $sql = 'SELECT * FROM productos WHERE nombre = ?';
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(1, $nombre);
            $consulta->execute();
    
            $fila = $consulta->fetch();
    
          
        }
        catch (PDOException $error) 
        {
            die("Error: ".$error->getMessage());
        }

        return $fila;
    }
?>