<?php
/*function select ($dbh){
    $stmt = $dbh->prepare("SELECT idEmpresa FROM Empresa Where nomEmpresa = 'thunder'");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $idempresa = $row->idEmpresa;
    }
    return $idempresa;
}*/

function insertAnuncio($dbh,$titulo,$descripcion,$categoria){
    $data = array('descripcion' => $descripcion, 'titulo'=> $titulo,'idempresa' => '1', 'idcategoria' => $categoria);

    $stmt = $dbh->prepare("INSERT INTO Anuncio (titulo,descripcion,idEmpresa,idCategoria) VALUES (:titulo,:descripcion,:idempresa,:idcategoria)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}
