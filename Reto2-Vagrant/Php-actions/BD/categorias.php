<?php
//funcion para insertar Categoria

function insert($dbh){
    $data = array('nomCat' => 'Motor');

    $stmt = $dbh->prepare("INSERT INTO Categoria (nomCategoria) VALUES (:nomCat)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}
//funcion para coger el id y el nombre de la Categoria
function selectCategorias ($dbh){
    $stmt = $dbh->prepare("SELECT idCategoria,nomCategoria FROM Categoria");
    $stmt->execute();
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $array;
}
?>