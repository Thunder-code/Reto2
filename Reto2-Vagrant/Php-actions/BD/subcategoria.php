<?php
function select ($dbh){
    $stmt = $dbh->prepare("SELECT idCategoria FROM Categoria Where nomCategoria = 'motor'");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $idcategoria = $row->idCategoria;
    }
    return $idcategoria;
}

function insert($dbh,$idcategoria){
    $data = array('nomSubCat' => 'motos', 'idCategoria' => $idcategoria);
    $stmt = $dbh->prepare("INSERT INTO Subcategoria (nomSubcategoria,idCategoria) VALUES (:nomSubCat, :idCategoria)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    echo "insert";

}


function selectSubcategoria($dbh)
{
    $stmt = $dbh->prepare("SELECT nomSubcategoria FROM Subcategoria 
                           Where idSubcategoria = (SELECT idSubcategoria FROM Anuncio
                                                   WHERE idAnuncio = 1)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        $idsubcategoria = $row->idSubcategoria;
    }
    return $idsubcategoria;
}