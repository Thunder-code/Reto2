<?php
require_once "../BD/conexionBD.php";
require_once "../BD/empresa.php";
require_once "../BD/usuario.php";

$dbh = connect();

if (isset($_GET["nombre"]) && isset($_GET["email"]) && isset($_GET["telefono"])) {
    insertEmpresa($dbh, $_GET["nombre"], $_GET["email"], $_GET["telefono"], $_GET["direccion"]);
    updateUsuario($dbh,$_GET["nombre"]);
    include "empresaRegistrado.php";
}
?>