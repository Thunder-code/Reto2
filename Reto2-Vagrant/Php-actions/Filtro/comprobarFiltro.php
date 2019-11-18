<?php
require "../BD/conexionBD.php";
require "../BD/filtro.php";

echo $_GET["titulo"];
    $cla = clausula($_GET["titulo"], $_GET["categoria"],$_GET["subcategoria"],$_GET["empresa"]);

    echo $cla;
    /*selectAnuncioInicial($dbh,$cla,$_GET["titulo"], $_GET["categoria"],$_GET["subcategoria"],$_GET["empresa"]);
    include "filtroAnuncio.php";*/

