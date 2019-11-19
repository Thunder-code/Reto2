<?php
require "../BD/conexionBD.php";
require "../BD/filtro.php";

    $dbh =connect();
/*
    $cla = clausula($_GET["titulo"], $_GET["categoria"],$_GET["subcategoria"],$_GET["empresa"]);

   echo $_GET["buscadorTitulo"];
    echo $_GET["categorias"];
   */
    selectAnuncioInicial($dbh,$_GET["buscadorTitulo"], $_GET["categorias"],$_GET["subcategorias"],$_GET["buscadorEmpresa"]);

    include "filtroAnuncio.php";

?>
