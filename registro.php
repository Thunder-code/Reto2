<?php
require "comprobarRegistro.php";
require "BD/conexionBD.php";
require "BD/usuario.php";

$dbh = connect();

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"])){
    $username = comprobarUsuario($dbh);
    $pass = comprobarContraseñas();

    if($username == true && $pass == true){
        insertUsuario($dbh,$_POST["username"],$_POST["password"]);
        echo ("<p>Usuario creado</p>");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registro.php</title>
    </head>
    <body>
        <div id="formuRegistro">
            <form action="registro.php" method="post">
                <label>Nombre de usuario <input type="text" name="username"></label></br></br>
                <label>Contraseña <input type="password" name="password"></label>
                <label>Repetir contraseña <input type="password" name="password2"</label></br></br>

                <input type="submit" name="resgistrarse" value="Registrarse">
            </form>

            <a href="">Ya tengo una cuenta</a>
        </div>
    </body>
</html>
