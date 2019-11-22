<?php
    require "../BD/conexionBD.php";
    require "../BD/usuario.php";

    $dbh = connect();

    session_start();
    $usuregis = $_SESSION['registro'];

    datosUsuario($dbh,$usuregis);
?>
