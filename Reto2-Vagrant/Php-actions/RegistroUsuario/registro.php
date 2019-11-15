<?php

function registroMal($username,$pass,$malRegistro)
{
    $mensaje = "";

    if ($malRegistro == true) {
        if ($username == false) {
            $mensaje = "El nombre de usuario no esta disponible";
        } elseif ($pass == false) {
            $mensaje = "Las constraseñas no coinciden";
        }
    }

    return $mensaje;
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
            <form action="comprobarRegistro.php" method="post">
                <label>Nombre de usuario <input type="text" name="username"></label></br></br>
                <label>Contraseña <input type="password" name="password"></label>
                <label>Repetir contraseña <input type="password" name="password2"</label></br></br>

                <input type="submit" name="resgistrarse" value="Registrarse">
            </form>

            <a href="">Ya tengo una cuenta</a>
            <p><?php echo(registroMal($username,$pass,$malRegistro))?></p>
        </div>
    </body>
</html>