<?php
require "conexionBD.php";
require "empresa.php";

$dbh = connect();

if(isset($_GET["nom"]) && isset($_GET["email"]) && isset($_GET["tel"]) && isset($_GET["dire"])) {

    insertEmpresa($dbh, $_GET["nom"], $_GET["email"],$_GET["tel"],$_GET["dire"]);
    echo ("<p>Anuncio Insertado</p>");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>registroEmpresa.php</title>
</head>
<body>
<div id="formuEmpresa">
    <form action="registroEmpresa.php" method="get" >
        <label>Nombre: <input type="text" name="nom"></label></br></br>
        <label>Email: <input type="text" name="email"></label></br></br>
        <label>Telefono: <input type="text" name="tel"</label></br></br>
        <label>Direccion: <input type="text" name="dire"</label></br></br>


        <input type="submit" name="empresa" value="Empresa">
    </form>

</div>
</body>
</html>