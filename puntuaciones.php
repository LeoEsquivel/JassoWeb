<?php
    require 'conexion.php';

    $user = $_REQUEST['usuario'];
    $score = $_REQUEST['score'];

    $query = mysqli_query($conexion,"SELECT punt FROM usuarios WHERE usuario='$user'");

    if($query->num_rows > 0){
        $row = mysqli_fetch_assoc($query);
        $scoreActual = $row["punt"];        
    }

    if($score > $scoreActual){
        echo "<h1 id=titleFelicidades! Has superado tu anteorior puntaje C:</h1>";
        echo "<h3 id=title>Nueva puntuacion maxima: ".$scoreActual."</h3>";
        $actualiazar = "UPDATE usuarios SET punt=$score WHERE usuario='$user'";
        mysqli_query($conexion, $actualiazar);
    }else{
        echo "<h1 id=title>No lograste superar tu mayor puntuacion :(</h1>";
        echo "<h3 id=title>Puntuacion: ".$score."  Puntuacion maxima: ".$scoreActual."</h3>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Proyecto/Style/styles.css">
    <title>Tabla de Puntuaciones</title>
</head>
<body>
    <audio autoplay loop>
            <source src="../Proyecto/Resources/ending.mp3" type="audio/mpeg">
    </audio>
    <center>
        <div id="tablecontainer">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $query = "SELECT usuario, punt FROM usuarios ORDER BY punt DESC LIMIT 10";
                    $resultado = mysqli_query($conexion, $query);
                    $i = 0;
                    while($mostrar=mysqli_fetch_array($resultado)){
                    $i = $i + 1;
                ?>
                    <tr>
                        <th><?php echo $i?></th>
                        <td><?php echo $mostrar['usuario']?></td>
                        <td><?php echo $mostrar['punt'] ?></td>
                    </tr>
                    
                <?php
                    
                    }
                ?>

                </tbody>
            </table>
        </div>
        <br><br>
        <a id="loginbtn" href="index.php">Volver a jugar</a>
    </center>
    

    
</body>
</html>