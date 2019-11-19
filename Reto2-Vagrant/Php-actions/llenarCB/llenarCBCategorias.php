<?php
    include ("../BD/conexionBD.php");
    include ("../BD/categorias.php");

$dbh = connect();
$categorias = selectCategorias($dbh);


function llenarCategorias($categorias)
{
    echo "<option></option>";
    foreach ($categorias as $row) {
        echo("<option value='" . $row["idCategoria"] . "'>" . $row["nomCategoria"] . "</option>");
    }
}
?>
