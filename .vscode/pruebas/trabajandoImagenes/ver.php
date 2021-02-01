<body bgcolor="#bed7c0">
<div class="main">
<h1>Mostrando imagen almacenada en MySQL</h1>
  <div class="panel panel-primary">
    <div class="panel-body">
    <?php
    $Host = 'localhost';
    $Username = 'root';
    $Password = 'root';
    $dbName = 'images_db';
    
    //Crear conexion mysql
    $db = new mysqli($Host, $Username, $Password, $dbName);
    
    //revisar conexion
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Extraer imagen de la BD mediante GET
    $result = $db->query("SELECT imagenes FROM images_tabla WHERE id = 4");
    
    if($result->num_rows > 0){
        $imgDatos = $result->fetch_assoc();
    ?>
        
     <img src='data:image/png;base64,<?php echo ($imgDatos['imagenes'])?>' alt='Img blob desde MySQL' width="600" /> 
   <?php
       /* header("Content-type: image/jpg"); 
        echo $imgDatos['imagenes']; */
    }else{
        echo 'Imagen no existe...';
    }
    ?>
      </div> 
    </div>
 </div>
</body>