<?php
    require ("Php-actions/llenarCB.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>index.php</title>
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
                <select name="categoria" id="categoria">
                    <?php llenarCategorias($categorias)?>
                </select>

                <label>Subcategoria: </label>
                <select name="categoria" id="categoria">
                    <?php llenarCategorias($categorias)?>
                </select>

                <label for="busEmpresa">Empresa: </label><input type="text" name="buscadorEmpresa" id="busEmpresa">
            </div>
        </div>
        <div id="anuncios">
            <div class="anuncio">
                <h3>Anuncio 1</h3>
            </div>
            <div class="anuncio">
                <h3>Anuncio 2</h3>
            </div>
            <div class="anuncio">
                <h3>Anuncio 3</h3>
            </div>
            <div class="anuncio">
                <h3>Anuncio 4</h3>
            </div>
            <div class="anuncio">
                <h3>Anuncio 5</h3>
            </div>
            <div class="anuncio">
                <h3>Anuncio 6</h3>
            </div>
        </div>
    </body>
</html>

