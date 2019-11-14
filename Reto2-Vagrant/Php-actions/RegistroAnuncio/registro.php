<?php
require "../BD/conexionBD.php";
require "../BD/categorias.php";

$dbh = connect();
$categorias = selectCategorias($dbh);

function llenarCategorias($categorias){
    foreach ($categorias as $row){
        echo ("<option value='" . $row["idCategoria"] . "'>" . $row["nomCategoria"]. "</option>");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>registroAnuncio.php</title>
    </head>
    <body>
        <div id="formuAnuncio">
            <form action="comprobarRegistro.php" method="get" enctype='multipart/form-data'>
                <label>Titulo: <input type="text" name="titulo"></label></br></br>
                <label>Descripcion: <input type="text" name="descripcion"></label></br></br>
                <label>Imagen: <input type="file" name="imagen"</label></br></br>
                <label>Categoria:
                    <select name="categoria">
                        <?php llenarCategorias($categorias)?>
                    </select>
                </label></br></br>
                <label>Subcategoria: <input type="text" name="subCategoria" disabled></label></br></br>

                <input type="submit" name="publicar" value="Publicar">
            </form>

        </div>
    </body>
</html>