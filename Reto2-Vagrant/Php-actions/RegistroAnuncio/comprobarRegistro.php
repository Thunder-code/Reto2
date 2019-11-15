<?php
require "../BD/conexionBD.php";
require "../BD/anuncio.php";

$dbh = connect();

echo $_GET["imagen"];

if(isset($_GET["titulo"]) && isset($_GET["descripcion"]) && isset($_GET["categoria"]) && isset($_GET["imagen"])) {
    echo "<p>" .$_GET["imagen"]."</p>";




    $carpeta_destino = '/Users/2gdaw06/Downloads/'.$_GET["imagen"];
    echo "<p>".$carpeta_destino."</p>";


    insertAnuncio($dbh, $_GET["titulo"], $_GET["descripcion"],$_GET["categoria"], $carpeta_destino);
    require ("anunciado.php");
    selectAnuncioInicial($dbh);
}

?>