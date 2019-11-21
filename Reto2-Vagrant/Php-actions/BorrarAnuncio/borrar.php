<?php
include_once "../BD/anuncio.php";
include_once "../BD/conexionBD.php";

$dbh = connect();
deleteAnuncio($dbh,$_POST["idAnuncio"]);
header("Location: ../../html/index.php");
?>