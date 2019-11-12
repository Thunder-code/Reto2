<?php

function insert($dbh){
    $data = array('nomCat' => 'moda');

    $stmt = $dbh->prepare("INSERT INTO Categoria (nomCategoria) VALUES (:nomCat)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    echo "insert";

}

function selectCategorias ($dbh){
    $stmt = $dbh->prepare("SELECT idCategoria,nomCategoria FROM Categoria");
    $stmt->execute();
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $array;
}

function selectidCategoria ($dbh,$nomCategoria){
    $stmt = $dbh->prepare("SELECT idCategoria FROM Categoria WHERE nomCategoria = $nomCategoria");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    while ($row = $stmt ->fetch()){
        $idCategoria = $row->idCategoria;
    }

    return $idCategoria;
}