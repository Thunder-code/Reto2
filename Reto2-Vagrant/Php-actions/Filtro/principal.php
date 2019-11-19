<?php
require ("../llenarCB/llenarCBCategorias.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>index.php</title>
        <script src="../../javascript/jquery-3.4.1.min.js"></script>
        <script src="../../javascript/llenarSubcategorias.js"></script>
    </head>
    <body>
        <div id="buscador">
            <form action="comprobarFiltro.php" method="get" enctype='multipart/form-data'>
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
    </body>
</html>

