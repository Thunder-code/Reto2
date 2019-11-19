

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
    <div class="contenedor">
        <?php selectAnuncioInicial($dbh); ?>
    </div>
<?php
require "footer.php";
?>




