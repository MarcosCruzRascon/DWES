<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="estilos.css">
  <script src="../controlador/scriptLogin.js"></script>

</head>

<body>
  <header>
    <?php
    require_once "cabecera.php";
    ?>
  </header>
  <form action="../controlador/login_controller.php" method="post">
    <div class="container">
      <?php
        if (isset($_GET['user'])) {
          echo "<span style='color:red'>Debe introducir usuario y/o contraseña validos!!</span><br/>";
        }
      ?>
      <label for="uname">Usuario</label>
      <input type="text" placeholder="Nombre de usuario" name="usuario" required>

      <div class="campo">
        <label for="psw">Contraseña</label>
        <input id="password" class="contrasenia"type="password" placeholder="Inserte contraseña" name="password" required>
        <span>Mostrar</span>
      </div>
      

      <label for="cod">Codigo de examen</label>
      <?php
        if (isset($_GET['cod'])) {
          echo "<span style='color:red'> &lt;-- Debe introducir un codigo valido!!</span>";
        }
      ?>
      <input type="text" placeholder="Inserte el codigo de examen" name="cod" required>
      <br />
      <button class="enviar" type="submit">Entrar</button>
    </div>
  </form>

</body>

</html>