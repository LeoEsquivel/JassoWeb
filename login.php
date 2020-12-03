<?php
    require 'conexion.php';
    $valido = false;
    if(isset($_POST['aceptar'])){
        $usuario=$_POST['usuario'];
        $contrasena=$_POST['contrasena'];

        if(!valida_usuario_bd($usuario, $contrasena, $conexion)){
            echo 'No es valido <br/>';
            $valido=false;
        }else{
            echo 'Si es valido <br/>';
            session_start();
            $valido=true;
            $_SESSION['usuario']=$usuario;
            header('Location:index.php');
        }    
    }
?>

<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../Proyecto/Style/styles.css">
        <title>Login</title>
    </head>
    <body>
        <audio autoplay loop>
            <source src="../Proyecto/Resources/intro.mp3" type="audio/mpeg">
        </audio>
        <div id="register">
           
            <h2 id=title>Inicia sesion para poder jugar</h2>
            
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div id="login">
                    <label>Usuario:</label>
                    <input id="inputdata" type="text" name="usuario" id="usuario" placeholder="Usuario" require="Introduce el nombre de usuario">
                </div>
                <div id="login">
                    <label>Contraseña:</label>
                    <input id="inputdata" type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                </div>
                <center>
                    <div>
                        <a id="loginbtn" href="registrarse.php">Registrarse</a>
                        <input id="loginbtn" type="submit" value="Entrar" name="aceptar">
                    </div>
                </center>
                <?php
                    if(!$valido && isset($_POST['aceptar'])){
                        echo '<p class="alerta"> Usuario y/o contrasena no valido </p>';
                    }
                ?>
            </form>
        
            
        </div>
    </body>
</html>