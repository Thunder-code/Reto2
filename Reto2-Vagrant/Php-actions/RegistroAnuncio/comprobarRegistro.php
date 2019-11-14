<?php
require "../BD/conexionBD.php";
require "../BD/anuncio.php";

$dbh = connect();

if(isset($_GET["titulo"]) && isset($_GET["descripcion"]) && isset($_GET["categoria"])) {
    insertAnuncio($dbh, $_GET["titulo"], $_GET["descripcion"],$_GET["categoria"]);
    include "index.php";
}
?>