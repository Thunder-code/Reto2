
<script src="../javascript/jquery-3.4.1.min.js"></script>
<script src="../javascript/index.js"></script>
<script src="../javascript/login.js"></script>
<link rel="stylesheet" href="../CSS/index.css">
<link rel="stylesheet" href="../CSS/global.css">
<?php


require "header.php";
require_once "../Php-actions/BD/conexionBD.php";
require "../Php-actions/BD/anuncio.php";
$dbh = connect();


  ?>
<!-- Div gris que aparece al darle click en un anuncio -->
<div class="cortinaGris"></div>
    <div class="contenedor">
        <!-- Cargamos todos los anuncios que hay en la base de datos -->
        <?php selectAnuncioInicial($dbh); ?>
    </div>

<?php
require "footer.php";
?>




