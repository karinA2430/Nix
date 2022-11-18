<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

require 'admin/config.php';

if (isset($_SESSION['usuario'])){
    header("Location: $ruta"."dashboard/pages/dashboard.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuarios</title>
    <link rel="shortcut icon" href="estilos/login/imagenes/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/register.css">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</head>
<body>
    

<div class="main">
    <div class="container">
        <div class="cont_1">
        <span class="iconify" data-icon="gridicons:multiple-users" style="color: white;" data-width="100"></span>
        </div>
        <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="cont_2">
            <div class="title">
                <p>Registro de Usuarios</p>
            </div>
            <div class="conte_1">
                <span class="iconify" data-icon="carbon:user-avatar" data-width="25"></span><input type="text" name="usuario" id="" class="input_escr" placeholder="Usuario">
            </div>
            <div class="conte_2">
            <span class="iconify" data-icon="bx:check-shield" data-width="25"></span></span></span><input type="password" name="password" id="" class="input_escr" placeholder="Contraseña">
            </div>
            <div class="conte_3">
            <span class="iconify" data-icon="bx:check-shield" data-width="25"></span></span></span><input type="password" name="password2" id="" class="input_escr" placeholder="Repetir Contraseña">
            </div>
            <?php if(!empty($errores)): ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="conte_3">
                <input type="submit" value="Registrarme" class="input_enviar">
            </div>
        </form>
        <div class="cont_3">
            <p>Copyring @ RickBroken 2022</p>
        </div>
    </div>
</div>
<script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
<script src="js/validar_contacto.js"></script>
</body>
</html>