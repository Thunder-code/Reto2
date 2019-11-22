<?php
    require "../Php-actions/BD/conexionBD.php";
    require "../Php-actions/BD/usuario.php";

    $dbh = connect();

    session_start();
    $usuregis = $_SESSION['registro'];

    datosUsuario($dbh,$usuregis);
?>
