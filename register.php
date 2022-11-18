<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

require 'admin/config.php';
require 'funciones/funciones.php';

if (isset($_SESSION['usuario'])){
    header("Location: $ruta"."dashboard/pages/dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = strtolower($_POST['usuario']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $errores = '';

    if (empty($usuario) or empty($password) or empty($password2)){
        $errores .= '<li>Rellena los datos correctamente</li>';
    } else {
        try {
            $conexion = conexion($bd_config);

            $statement = $conexion->prepare('
            SELECT * FROM usuarios WHERE usuario = :usuario  LIMIT 1'
            );

            $statement->execute(array(':usuario' => $usuario));

            $resultado = $statement->fetch();

            if($resultado !== false){
                $errores .= '<li>El unombre de usuario ya existe</li>';
            }

            $password = hash('sha512', $password);
            $password2 = hash('sha512', $password2);

            if ($password !== $password2){
                $errores .= '<li>Las contraseñas deben ser iguales</li>';
            }

        } catch (PDOExection $e) {
            header('Location: error/error.php');
        }
    }

    if ($errores == '') {
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('
        INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)'
        );
        $statement->execute(
            array(
                ':usuario' => $usuario,
                ':pass' => $password
            ));
        header('Location: index.php');
    }
}


require 'register.view.php';
?>