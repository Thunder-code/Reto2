<?php

function selectSubCategorias ($dbh){
    $arraySubcategorias = array();

    $stmt = $dbh->prepare("SELECT nomSubcategoria FROM Subcategoria");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()) {
        $subcategoria = $row->nomSubcategoria;
        array_push($arraySubcategorias, $subcategoria);
    }

    return $arraySubcategorias;
}

function insert($dbh,$idcategoria){
    $data = array('nomSubCat' => 'motos', 'idCategoria' => $idcategoria);
    $stmt = $dbh->prepare("INSERT INTO Subcategoria (nomSubcategoria,idCategoria) VALUES (:nomSubCat, :idCategoria)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    echo "insert";

}

function selectnomSubcategoria($dbh,$idcategoria){

    $stmt = $dbh->prepare("SELECT nomSubcategoria FROM Subcategoria WHERE idCategoria = $idcategoria") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);

    while ($row = $stmt ->fetch()){
        $nomSubcategoria = $row->nomSubcategoria;
    }

    return $nomSubcategoria;


}

function selectidSubcategoria($dbh,$nomSubcategoria){

    $stmt = $dbh->prepare("SELECT idSubcategoria FROM Subcategoria WHERE nomSubcategoria = $nomSubcategoria") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);

    while ($row = $stmt ->fetch()){
        $idSubcategoria = $row->idSubcategoria;
    }

    return $idSubcategoria;

}

