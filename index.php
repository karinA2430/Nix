<?php

require 'admin/config.php';
require 'funciones/funciones.php';

session_start();

if (isset($_SESSION['usuario'])){
    header("Location: $ruta"."dashboard/pages/dashboard.php");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
    //$usuario = hash('sha512', $usuario);
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    $conexion = conexion($bd_config);

    if (!$conexion){
        header('Location: error/error.php');
    }


    $statement = $conexion->prepare('
    SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password'
    );

    $statement->execute(array(
        ':usuario' => $usuario,
        ':password' => $password
    ));

    $errores = '';

    $resultado = $statement->fetch();
    if($resultado !== false){
        $_SESSION['usuario'] = $usuario;
        header('Location: dashboard/index.php');
    } else {
        $errores .= '<li>Datos Incorrectos</li>'; 
    }

}




require 'index.view.php';

?>