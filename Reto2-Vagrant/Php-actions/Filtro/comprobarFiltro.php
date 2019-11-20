<?php
require_once "../BD/conexionBD.php";
require "../BD/filtro.php";

    $dbh =connect();
    selectAnuncioInicial($dbh,$_GET["buscadorTitulo"], $_GET["categorias"],$_GET["subcategorias"],$_GET["buscadorEmpresa"]);

?>
