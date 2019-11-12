<?php
require "conexionBD.php";

$dbh = connect();
select($dbh);

function select ($dbh){
    $stmt = $dbh->prepare("SELECT imagen FROM Anuncio Where idAnuncio = '5'");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $imagen = $row->imagen;
        $imagen = base64_decode($imagen);
        echo ($imagen);
    }
}