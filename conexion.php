<?php

    $bd = 'juegobd';
    $servidor = 'localhost';
    $usuario = 'root';
    $contrasena = '';


$conexion = mysqli_connect($servidor, $usuario, $contrasena, $bd);

if(!$conexion){
    die("Conexion a la base de datos ".$bd. "fallo: ".mysqli_connect_error());
}

function valida_usuario_bd($usuario, $contrasena, $conexion){
    $query = "SELECT 1 as User_Valido FROM usuarios WHERE usuario='$usuario' AND contrasena=MD5('$contrasena')";
    $resultado = mysqli_query($conexion, $query) or die ('Error al ejecutar la consulta');
    if(mysqli_num_rows($resultado==0)){
        return false;
    }else{
        return true;
    }
}

/*if (valida_usuario_bd('Leo', '1234', $conexion)){
    echo "usuario ";
}else{
    echo 'Algo';
}*/

    
