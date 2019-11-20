<?php
require_once "../BD/conexionBD.php";
require "../BD/subcategoria.php";
//Funcion para llenar el combobox de subcategorias
if(isset($_POST["idCategoria"])){
    $html= "";
    $dbh = connect();
    $subCategorias = selectSubcategorias($dbh,$_POST["idCategoria"]);

    $html = $html . "<option></option>";

    foreach ($subCategorias as $row) {
        $html= $html."<option value='" . $row["idSubcategoria"] . "'>" . $row["nomSubcategoria"] . "</option>";
    }
    echo $html;
}