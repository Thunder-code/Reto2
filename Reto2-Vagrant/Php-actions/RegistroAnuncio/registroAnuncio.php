<?php
$pagina = "regAnuncio";
require("../llenarCB/llenarCBCategorias.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>registroAnuncio.php</title>
    <link rel="stylesheet" href="../../CSS/registro-anuncio.css">
    <link rel="stylesheet" href="../../CSS/global.css">
</head>
<body>
<div class="contenedor">
<div id="formuAnuncio">
    <form action="comprobarRegistro.php" class="cFormulario" method="post" enctype='multipart/form-data'>
        <div class="tituloFormulario"><h2>Registra tu anuncio</h2></div>
        <div class="inputsFormulario">
          <input type="text" name="titulo" placeholder="Titulo">
          <input type="text" name="descripcion" placeholder="Descripcion">
          <input type="file" name="imagen" placeholder="Imagen">
        </div>

            <select name="categoria">
                <?php llenarCategorias($categorias)?>
            </select>
        <br>
        <br>

        <p> Subcategoria </p><input type="text" name="subCategoria" id="subcategoria" disabled>
        <br>
        <br>
        <input type="submit" name="publicar" value="Publicar">

    </form>
</div>
</div>
</body>
</html>