<?php
require "BD/conexionBD.php";
require "BD/subcategoria.php";

if(isset($_POST["idCategoria"])){
    $html= "";
    $dbh = connect();
    $subCategorias = selectSubcategorias($dbh,$_POST["idCategoria"]);

    echo "<option>--Elige una Categoria--</option>";
    foreach ($subCategorias as $row) {
        $html= $html."<option value='" . $row["idSubcategoria"] . "'>" . $row["nomSubcategoria"] . "</option>";
    }
    echo $html;
}