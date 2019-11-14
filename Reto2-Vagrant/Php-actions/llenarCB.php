<?php
require ("BD/conexionBD.php");
require ("BD/categorias.php");
require ("BD/subcategoria.php");

$dbh = connect();
$categorias = selectCategorias($dbh);


function llenarCategorias($categorias)
{
        echo "<option>--Elige una Categoria--</option>";
    foreach ($categorias as $row) {
        echo("<option value='" . $row["idCategoria"] . "'>" . $row["nomCategoria"] . "</option>");
    }
}

function llenarSubcategorias($subcategorias)
{
    echo "<option>--Elige una Subcategoria--</option>";
    foreach ($subcategorias as $row) {
        echo("<option value='" . $row["idSubcategoria"] . "'>" . $row["nomSubcategoria"] . "</option>");
    }
}
?>
