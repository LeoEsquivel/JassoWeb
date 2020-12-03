<?php
    require "conexion.php";

    $valido = false;

    if (isset($_POST["enviar"])) {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $consulta = "INSERT INTO usuarios VALUES (NULL, \"$usuario\", md5(\"$contrasena\"), 0)";

        mysqli_query($conexion, $consulta);
        header("Location:login.php");
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Proyecto/Style/styles.css">
    <title>Registrarse</title>
</head>
<body>
    <main>
        <div id="register">
            <h1 id="title">Registrarse</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div id="login">
                    <label for="usuario">Usuario:</label>
                    <input id="inputdata" type="text" name="usuario" id="usuario" placeholder="Usuario">
                </div>
                <div id="login">
                    <label for="contrasena">Contraseña</label>
                    <input id="inputdata" type="password" name="contrasena" id="contrasena" placeholder="Contraseña">
                </div>
                <div>
                    <input id="btnlogin" type="submit" value="submit" name="enviar">
                </div>
            </form>
        </div>
        
    </main>
</body>
</html>