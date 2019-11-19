<?php
require "../BD/conexionBD.php";
require "../BD/anuncio.php";

$dbh = connect();

if(isset($_POST["titulo"]) && isset($_POST["descripcion"]) && isset($_POST["categoria"]) && isset($_FILES["imagen"])) {

$rutafototemporal = $_FILES["imagen"]["tmp_name"];
$array = explode('.', $_FILES['imagen']['name']);
$ext = end($array);
$nombreFoto = md5(basename($_FILES['imagen']['name'])). '.' . $ext;
$nuevaRuta = "../../imagenes/" . $nombreFoto;
move_uploaded_file($rutafototemporal,$nuevaRuta);

    $filas = insertAnuncio($dbh, $_POST["titulo"], $_POST["descripcion"],$_POST["categoria"],$nombreFoto);
    include "anuncioRegistrado.php";
    selectAnuncioInicial($dbh);
}
?>