<?php
require_once "../BD/conexionBD.php";
require_once "../BD/usuario.php";
/*require_once "../login-action.php";*/



$dbh = connect();
session_start();
datosUsuario($dbh,$_SESSION['registro']);





?>
