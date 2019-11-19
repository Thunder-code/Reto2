<?php
    require ("Php-actions/llenarCB/llenarCBCategorias.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>index.php</title>
        <script src="javascript/jquery-3.4.1.min.js"></script>
        <script src="javascript/llenarSubcategorias.js"></script>
    </head>
    <body>
        <div id="buscador">
            <div>
                <p>V
                <input type="text" name="buscadorTitulo">
                <input type="submit" name="botonBuscar" value="Buscar">
                </p>
            </div>
            <div>
                <label>Categoria: </label>
                <select name="categorias" id="categorias">
                    <?php llenarCategorias($categorias)?>
                </select>

                <label>Subcategoria: </label>
                <select name="subcategorias" id="subcategorias">
                </select>

                <label for="busEmpresa">Empresa: </label><input type="text" name="buscadorEmpresa" id="busEmpresa">
            </div>
        </div>
    </body>
</html>