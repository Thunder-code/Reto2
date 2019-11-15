<?php
require ("BD/conexionBD.php");
require ("BD/categorias.php");

$dbh = connect();
$categorias = selectCategorias($dbh);


function llenarCategorias($categorias)
{
    echo "<option>--Elige una Categoria--</option>";
    foreach ($categorias as $row) {
        echo("<option value='" . $row["idCategoria"] . "'>" . $row["nomCategoria"] . "</option>");
    }
}
?>
