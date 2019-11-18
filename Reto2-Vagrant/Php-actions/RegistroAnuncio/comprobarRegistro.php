<?php
require "../BD/conexionBD.php";
require "../BD/anuncio.php";

$dbh = connect();

echo $_GET["imagen"];

if(isset($_GET["titulo"]) && isset($_GET["descripcion"]) && isset($_GET["categoria"]) && isset($_GET["imagen"])) {
    echo "<p>" .$_GET["imagen"]."</p>";
    $carpetaDestino="../../imagenes/";

    $origen=$_FILES["imagen"]["tmp_name"];
    $destino=$carpetaDestino.$_FILES["imagen"]["name"];

    if(@move_uploaded_file($origen, $destino)){
        echo "<br>".$_FILES["imagen"]["name"]." movido correctamente";
    }else
        echo "<br>No se ha podido mover el archivo: ".$_FILES["imagen"]["name"];

    $nomImagen = $_GET["imagen"];


    insertAnuncio($dbh, $_GET["titulo"], $_GET["descripcion"],$_GET["categoria"],$nomImagen);
    include "anuncioRegistrado.php";
    selectAnuncioInicial($dbh);
}
?>