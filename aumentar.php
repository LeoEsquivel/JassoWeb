<?php
    require 'conexion.php';

    $usuario = $_GET["user"];
    $score = $_GET["score"];

    echo $usuario;
    echo $score;

    $querypuntaje = "SELECT punt WHERE usuario=\"$usuario\"";
    $actualPunt = mysqli_query($conexion, $querypuntaje);

    echo $actualPunt;

    if($score > $actualPunt){
        $actualiazar = "UPDATE usuarios SET punt=\"$score\" WHERE usuario=\"$usuario\"";
        mysqli_query($conexion, $actualiazar);
    }
?>
