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

            <div class="abrirFiltros"><img src="../../multimedia/menu.png"></div>
            <form action="../Php-actions/Filtro/comprobarFiltro.php" method="get" id="formFiltro" enctype='multipart/form-data'>
                <div class="contenedorInputs">
                    <div class="buscadorTitulo">
                     <p>Titulo:
                        <input type="text" name="buscadorTitulo" placeholder="Search...">
                    </p>
                </div>

                  <div class="categorias">
                    <label>Categoria: </label>
                         <select name="categorias" id="categorias">
                             <?php llenarCategorias($categorias)?>
                         </select>
                     <label>Subcategoria: </label>
                        <select name="subcategorias" id="subcategorias"></select>
                   </div>
                <div class="buscadorEmpresa">
                    <label for="busEmpresa">Empresa: </label><input type="text" name="buscadorEmpresa" id="busEmpresa" placeholder="Search...">
                </div>
                </div>
                <div class="boton">
                    <input type="submit" name="botonBuscar" value="Buscar">
                </div>

            </form>
        </div>

