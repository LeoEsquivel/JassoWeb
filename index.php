<?php
    require 'abre_sesion.php';
    $usernameSes = $_SESSION['usuario'];
    $username = htmlspecialchars($usernameSes);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JuegoAZurePractice</title>
        <link rel="stylesheet" type="text/css" href="../Proyecto/Style/styles.css">
    </head>
    <body>
        <audio autoplay loop>
            <source src="../Proyecto/Resources/fondoJuego.mp3" type="audio/mpeg">
        </audio>
        <center>
        <button id="startGame" onclick="startFunc()">Start</button>
        </center>
        
        <div id="mainGame">
        <center>
            <p id="username"><?php echo $username ?></p>
            <canvas id="canvas" height="300" width="300">        
        </center>
        
        <center>
            <div id="cont2">
                <button id="up">/\</button>
                <button id="l"><</button>
                <button id="bottom">\/</button>         
                <button id="r">></button>
            </div>        
            <div id="cont3"> 
                <div id="s">Puntuacion: <span id="score"></span></div>   
                <div id="t">Tiempo: <span id="time"></span></div>
            </div>
        </center>
        
        </div>
        <script src="../Proyecto/Script/juego.js"></script>
    </body>
</html>