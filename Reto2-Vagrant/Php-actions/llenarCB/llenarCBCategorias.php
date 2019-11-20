<?php
require_once ("../Php-actions/BD/conexionBD.php");
require_once ("../Php-actions/BD/categorias.php");

$dbh = connect();
$categorias = selectCategorias($dbh);

//Funcion para llenar el combobox de categorias
function llenarCategorias($categorias)
{
    echo "<option></option>";
    foreach ($categorias as $row) {
        echo("<option value='" . $row["idCategoria"] . "'>" . $row["nomCategoria"] . "</option>");
    }
}
?>
