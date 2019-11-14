<?php
require "../BD/conexionBD.php";
require "../BD/empresa.php";

$dbh = connect();

if (isset($_GET["nombre"]) && isset($_GET["email"]) && isset($_GET["telefono"])) {
    insertEmpresa($dbh, $_GET["nombre"], $_GET["email"], $_GET["telefono"], $_GET["direccion"]);
    include "index.php";
}
?>