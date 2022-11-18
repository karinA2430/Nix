<?php

function conexion($bd_config){
    try {
       $conexion = new PDO('mysql:host=127.0.0.1;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
       return $conexion;
    } catch (PDOException $e){
        return false;
    }
}

function limpiardatos($datos){
    $datos = trim($datos);
    $datos = htmlspecialchars($datos);
    $datos = filter_var($datos, FILTER_SANITIZE_STRING);
    return $datos;
}



?>