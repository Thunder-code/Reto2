<?php

include "conexionBD.php";
$dbh = connect();
insertSubcategoria($dbh);

function insertSubcategoria($dbh){
    $data = array('nomSubcat' => 'Furgonetas','idCat' => '3');

    $stmt = $dbh->prepare("INSERT INTO Subcategoria (nomSubcategoria,idCategoria) VALUES (:nomSubcat,:idCat)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    echo "Insertado";
}

function selectSubcategorias ($dbh,$idCategoria){
    $data = array('idcategoria' => $idCategoria);

    $stmt = $dbh->prepare("SELECT idSubcategoria,nomCategoria FROM Subcategoria
                           WHERE idCategoria = (SELECT idCategoria FROM categoria
                                                WHERE idCategoria = :idcategoria");
    $stmt->execute($data);
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $array;
}