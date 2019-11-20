<?php
require "../BD/conexionBD.php";
require "../BD/empresa.php";
require "../BD/usuario.php";

$dbh = connect();
session_start();
session_start();
echo $_SESSION['registro'];
$usuarioSesion = $_SESSION['registro'];
echo $_SESSION['registro'];

echo $usuarioSesion;
if (isset($_GET["nombre"]) && isset($_GET["email"]) && isset($_GET["telefono"])) {
    session_start();
    $empresaSesion = $_SESSION['sesinempresa'];

    echo $_SESSION['registro'];
    insertEmpresa($dbh, $_GET["nombre"], $_GET["email"], $_GET["telefono"], $_GET["direccion"]);
    updateUsuario($dbh,$usuarioSesion,$empresaSesion);
    include "empresaRegistrada.php";
}
?>