<?php
require "conexionBD.php";
require "categorias.php";
require "anuncio.php";

$dbh = connect();
$categorias = selectCategorias($dbh);

selectAnuncio($dbh);
function llenarCategorias($categorias){
    foreach ($categorias as $row){
        echo ("<option value='" . $row["idCategoria"] . "'>" . $row["nomCategoria"]. "</option>");
    }
}
echo $_GET["titulo"];
if(isset($_GET["titulo"]) && isset($_GET["descripcion"]) && isset($_GET["categoria"])) {
    $imagen = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
    echo $imagen;
    insertAnuncio($dbh, $_GET["titulo"], $_GET["descripcion"],$_GET["categoria"],$imagen);
    echo ("<p>Anuncio Insertado</p>");
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
    <form action="registroAnuncio.php" method="get" enctype='multipart/form-data'>
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



