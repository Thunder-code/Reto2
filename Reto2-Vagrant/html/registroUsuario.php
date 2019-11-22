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

        <meta charset="UTF-8">
        <title>Registro.php</title>
        <link rel="stylesheet" href="../CSS/global.css">
        <link rel="stylesheet" href="../CSS/registro-usuario.css">
        <link rel="stylesheet" href="../CSS/header.css">
        <script src="../javascript/header.js"></script>

    <div class="contenedor">
        <div id="formuRegistro" class="cFormulario">

            <form action="../Php-actions/RegistroUsuario/comprobarRegistroUsuario.php" method="post">
                <div class="tituloFormulario"><h2>Registrate</h2></div>
                <div class="camposFormulario">
                <input type="text" name="username" id="username" placeholder="Nombre de usuario">
                <input type="password" name="password" id="password" placeholder="Contraseña" required>
                <input type="password" name="password2" id="password2" placeholder="Repetir Contraseña" required>
                </div>
                <div class="botonFormulario">
                  <input type="submit" name="resgistrarse" value="Registrarse">
                </div>
              <?php  if ($malRegistro == true) {
                if ($username == false) {
                    echo "<div class='mensajeError'>" . "<p>" .  registroMal( $username,$pass, $malRegistro). "</p>". " </div>";
                } elseif ($pass == false) {
                    echo "<div class='mensajeError'>" . "<p>" . registroMal($username,$pass, $malRegistro) . "</p>". " </div>";
                }
                } ?>
                <div class="linkFormulario">
                <a href="login.php">Ya tengo una cuenta</a>

                </div>
            </form>


         </div>
        </div>
    </body>
</html>