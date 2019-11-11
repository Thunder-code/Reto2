<?php
function selectSubcategoria($dbh){
    $stmt = $dbh->prepare("SELECT nomSubcategoria FROM Subcategoria 
                           Where idSubcategoria = (SELECT idSubcategoria FROM Anuncio
                                                   WHERE idAnuncio = 1)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $idsubcategoria = $row->idSubcategoria;
    }
    return $idsubcategoria;
}