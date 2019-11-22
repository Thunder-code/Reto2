<?php

require_once("../Php-actions/BD/conexionBD.php");
require_once("../Php-actions/BD/categorias.php");
require_once "header.php";

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


    <meta charset="UTF-8">
    <script src="../javascript/jquery-3.4.1.min.js"></script>
    <script src="../javascript/llenarSubcategorias.js"></script>
    <link rel="stylesheet" href="../CSS/registro-anuncio.css">
    <link rel="stylesheet" href="../CSS/global.css">
    <link rel="stylesheet" href="../CSS/header.css">


    <div class="contenedor">
        <div id="formuAnuncio">
            <form action="../Php-actions/RegistroAnuncio/comprobarRegistroAnuncio.php" class="cFormulario" method="post" enctype='multipart/form-data'>
                <div class="tituloFormulario"><h2>Registra tu anuncio</h2></div>
                <div class="inputsFormulario">
                  <input type="text" name="titulo" placeholder="Titulo">
                  <input type="text" name="descripcion" placeholder="Descripcion">
                  <input type="file" name="imagen" placeholder="Imagen">
                </div>

                <p>Categoria: </p>
                <select name="categoria" id="categorias">
                    <?php llenarCategorias($categorias)?>
                </select>
                <br>
                <br>
                <p>Subcategoria: </p>
                <select name="subcategoria" id="subcategorias">
                </select>

                <br>
                <br>
                <input type="submit" name="publicar" value="Publicar">

            </form>
        </div>
    </div>
<?php
require_once "footer.php";
?>