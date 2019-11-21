<?php
require_once ("../Php-actions/BD/categorias.php");

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



        <script src="../javascript/jquery-3.4.1.min.js"></script>
        <script src="../javascript/llenarSubcategorias.js"></script>

        <div id="buscador">
            <form action="../Php-actions/Filtro/comprobarFiltro.php" method="get" enctype='multipart/form-data'>
                <p>Titulo:
                <input type="text" name="buscadorTitulo">

                </p>

                <label>Categoria: </label>
                <select name="categorias" id="categorias">
                    <?php llenarCategorias($categorias)?>
                </select>

                <label>Subcategoria: </label>
                <select name="subcategorias" id="subcategorias">
                </select>

                <label for="busEmpresa">Empresa: </label><input type="text" name="buscadorEmpresa" id="busEmpresa">

                <input type="submit" name="botonBuscar" value="Buscar">
            </form>
        </div>

