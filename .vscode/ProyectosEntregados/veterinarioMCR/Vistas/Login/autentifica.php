<?php
$valida = new Validacion();
if (isset($_POST['submit'])) {
    $valida->Requerido('usuario');
    $valida->Requerido('contrasena');
    //Comprobamos validacion
    if ($valida->ValidacionPasada()) {
        if (Login::Identifica($_POST['usuario'], $_POST['contrasena'])) {
            $sesion = new Sesion();
            $conexion = new GBD("localhost", "veterinariomcr", "root", "");
            $sesion::iniciar();
            $array = [$_POST['usuario']];
            $usuario = $conexion->findById("cliente",$array);
            $sesion::escribir("usuario", $usuario);
            header("location:?menu=inicio");
        } else {
            header("location:?menu=login");
        }
    }
}
?>
<div class='w-50 p-3 container'>
    <div class='login-form'>
        <form action='' method='post' novalidate>
            <h2 class='text-center'>Identificate</h2>
            <div class='form-group'>
                <input type='text' class='form-control' name='usuario' placeholder='Usuario' required='required'>
                <?= $valida->ImprimirError('usuario');?>
            </div>
            <div class='form-group'>
                <input type='password' class='form-control' name='contrasena' placeholder='Contraseña' required='required'>
                <?= $valida->ImprimirError('contrasena'); ?>
            </div>
            <div class='form-group'>
                <button type='submit' name='submit' class='btn btn-primary btn-block'>Logueate</button>
            </div>
        </form>
    </div>
</div>