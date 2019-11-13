<?php

function select ($dbh){
    $stmt = $dbh->prepare("SELECT idEmpresa FROM Empresa Where nomEmpresa = 'thunder'");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $idempresa = $row->idEmpresa;
    }
    return $idempresa;
}

function selectCategoria ($dbh){
    $stmt = $dbh->prepare("SELECT idCategoria FROM Categoria Where nomCategoria = 'motor'");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $idcategoria = $row->idCategoria;
    }
    return $idcategoria;
}

function selectSubcategoria($dbh){
    $stmt = $dbh->prepare("SELECT idSubcategoria FROM Subcategoria Where nomSubcategoria = 'motos'");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $idsubcategoria = $row->idSubcategoria;
    }
    return $idsubcategoria;
}

function insertAnuncio($dbh,$titulo,$descripcion,$categoria){
    $data = array('descripcion' => $descripcion, 'titulo'=> $titulo,'idempresa' => '1', 'idcategoria' => $categoria);

    $stmt = $dbh->prepare("INSERT INTO Anuncio (titulo,descripcion,idEmpresa,idCategoria) VALUES (:titulo,:descripcion,:idempresa,:idcategoria)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}
