<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Ejemplo: Utilización include -->
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Formulario</title>
</head>
<?php 
    include("funciones.inc.php");
?>

<body>
    <?php include("cabecera.php") ?>
    <form name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <!--Insertar nombre y apellidos-->
        Nombre y apellidos: <input type="text" name="nombre" value="<?php if (isset($_GET['nombre'])) echo $_GET['nombre']; ?>" />
        <?php
        if (isset($_GET['enviar']) && empty($_GET['nombre'])) 
        {
            echo "<span style='color:red'> &lt;-- Debe introducir un nombre!!</span>";
        }
        else if(isset($_GET['enviar']) && !validaNombre($_GET['nombre']))
        {
            echo "<span style='color:red'> &lt;-- Debe introducir un nombre valido!!</span>";
        }
        ?><br />

        <!--Insertar email-->
        E-mail : <input type="text" name="email" value="<?php if (isset($_GET['email'])) echo $_GET['email']; ?>" />
        <?php
        if (isset($_GET['enviar']) && empty($_GET['email']))
        {
            echo "<span style='color:red'> &lt;-- Debe introducir un email!!</span>";
        }  
        else if(isset($_GET['enviar']) && !validaEmail($_GET['email']))
        {
            echo "<span style='color:red'> &lt;-- El correo no esta en formato valido!!</span>";
        }

        ?><br />

        <!--Insertar telefono-->
        Telefono : <input type="text" name="telefono" value="<?php if (isset($_GET['telefono'])) echo $_GET['telefono']; ?>" />
        <?php
        if (isset($_GET['enviar']) && empty($_GET['telefono']))
        {
            echo "<span style='color:red'> &lt;-- Debe introducir un numero de telefono!!</span>";
        }
        else  if (isset($_GET['enviar']) && !validaTelefono($_GET['telefono']))
        {
            echo "<span style='color:red'> &lt;-- Debe introducir un numero de telefono valido!!</span>";
        }
           
        ?><br />

        <!--Insertar web preferida-->
        Web preferida : <input type="text" name="webPreferida" value="<?php if (isset($_GET['webPreferida'])) echo $_GET['webPreferida']; ?>" />
        <?php
        if (isset($_GET['enviar']) && empty($_GET['webPreferida']))
        {
            echo "<span style='color:red'> &lt;-- Debe introducir una web preferida!!</span>";
        }
        else if(isset($_GET['enviar']) && !validaWeb($_GET['webPreferida']))
        {
            echo "<span style='color:red'> &lt;-- Debe introducir una web valida!!</span>";
        }
        ?><br />

        <!--Insertar fecha de nacimiento-->
        Fecha de nacimiento: <input type="date" name="fechaNacimiento" value="<?php if (isset($_GET['fechaNacimiento'])) echo $_GET['fechaNacimiento']; ?>" />
        <?php
        if (isset($_GET['enviar']) && empty($_GET['fechaNacimiento']))
            echo "<span style='color:red'> &lt;-- Debe introducir una fecha de nacimiento!!</span>"
        ?><br />

        <!--Insertar sexo-->
        Sexo:
        <input type="radio" name="sexo" <?php if (isset($_GET["sexo"]) && $_GET["sexo"] == "mujer") echo "checked"; ?> value="mujer">Mujer
        <input type="radio" name="sexo" <?php if (isset($_GET["sexo"]) && $_GET["sexo"] == "hombre") echo "checked"; ?> value="hombre">Hombre
        <span class="error"><?php if (isset($_GET['enviar']) && empty($_GET['sexo']))
                                    echo "<span style='color:red'> &lt;-- Debe seleccionar un sexo!!</span>" ?></span>

        <!--Insertar modulos-->
        <p>Módulos aprobados DAW:
          <?php
                if (isset($_GET['enviar']) && !empty($_GET['modulos2']) && empty($_GET['modulos1']))
                {
                    echo "<span style='color:red'> &lt;-- Debe escoger al menos un modulo de primero para elegir de segundo!!</span>";
                }
               
                
          ?>
          </p>
          <input type="checkbox" name="modulos1[]" value="programacion"
               <?php
                    if(isset($_GET['modulos1']) && in_array("programacion",$_GET['modulos1']))
                         echo 'checked="checked"';
               ?>
          />
               Programacion<br /> 
          <input type="checkbox" name="modulos1[]" value="entornos"
               <?php
                    if(isset($_GET['modulos1']) && in_array("entornos",$_GET['modulos1']))
                         echo 'checked="checked"';
               ?>
          />
               Entornos de desarrollo<br />
          <input type="checkbox" name="modulos1[]" value="sistemas"
               <?php
                    if(isset($_GET['modulos1']) && in_array("sistemas",$_GET['modulos1']))
                         echo 'checked="checked"';
               ?>
          />
               Sistemas informaticos<br />
          <input type="checkbox" name="modulos2[]" value="DWES"
               <?php
                    if(isset($_GET['modulos2']) && in_array("DWES",$_GET['modulos2']))
                         echo 'checked="checked"';
               ?>
          />
               Desarrollo web en entorno servidor<br />
          <input type="checkbox" name="modulos2[]" value="DIWEB"
               <?php
                    if(isset($_GET['modulos2']) && in_array("DIWEB",$_GET['modulos2']))
                         echo 'checked="checked"';
               ?>
          />
               Diseño de interfaces web<br />
         <input type="checkbox" name="modulos2[]" value="DWEC"
               <?php
                    if(isset($_GET['modulos2']) && in_array("DIWEB",$_GET['modulos2']))
                         echo 'checked="checked"';
               ?>
          />
                Desarrollo web en entorno cliente<br />
          <br />
        

        <!--Insertar conocimientos-->
        Conocimientos sobre html de 1 a 10: <input type="range" name="html" min="1" max="10" value="<?php if (isset($_GET['html'])) echo $_GET['html'];?>"><br />
        Conocimientos sobre MySQL de 1 a 10:<input type="range" name="mysql" min="1" max="10" value="<?php if (isset($_GET['mysql'])) echo $_GET['mysql'];?>"><br />
        Conocimientos sobre Ingles de 1 a 10:<input type="range" name="ingles" min="1" max="10" value="<?php if (isset($_GET['ingles'])) echo $_GET['ingles'];?>"><br />
        Conocimientos sobre PHP de 1 a 10:<input type="range" name="php" min="1" max="10" value="<?php if (isset($_GET['php'])) echo $_GET['php'];?>"><br />
        Conocimientos sobre JavaScript de 1 a 10:<input type="range" name="js" min="1" max="10" value="<?php if (isset($_GET['js'])) echo $_GET['js'];?>"><br />


        <!--Insertar experiencia-->
        Campos con experiencia laboral, separados por intro:<br />
        <textarea cols="70" rows="10" name="experiencia"><?php if (isset($_GET['experiencia'])) echo $_GET['experiencia'];?></textarea>
        <p></p>

        <!--Insertar sueldo actual-->
        Sueldo neto que cobra actualmente: <input type="text"  step="0.01" name="sueldoActual" value="<?php if (isset($_GET['sueldoActual'])) echo $_GET['sueldoActual']; ?>" />
        <?php
        if (isset($_GET['enviar']) && empty($_GET['sueldoActual']))
        {
            echo "<span style='color:red'> &lt;-- Debe introducir su actual salario!!</span>";
        }
        else if (isset($_GET['enviar']) && !validaSueldos($_GET['sueldoActual']))
        {
            echo "<span style='color:red'> &lt;-- Debe introducir un salario valido con dos decimales maximo!!</span>";
        }
        ?><br />

        <!--Insertar sueldo deseado-->
        Sueldo que le gustaria cobrar: <input type="text"  step="0.01" name="sueldoDeseado" value="<?php if (isset($_GET['sueldoDeseado'])) echo $_GET['sueldoDeseado']; ?>" />
        <?php
        if (isset($_GET['enviar']) && empty($_GET['sueldoDeseado']))
        {
            echo "<span style='color:red'> &lt;-- Debe introducir su actual salario!!</span>";
        }
        else if (isset($_GET['enviar']) && !validaSueldos($_GET['sueldoDeseado']))
        {
            echo "<span style='color:red'> &lt;-- Debe introducir un salario valido con dos decimales maximo!!</span>";
        }
        ?><br />

        <!--botones-->
        <input type="submit" value="Enviar" name="enviar" /> <input type="reset" value="Borrar formulario"/>
    </form>
    <?php include("pie.php") ?>
</body>

</html>