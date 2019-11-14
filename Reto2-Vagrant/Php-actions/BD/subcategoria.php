<?php
function selectSubcategorias ($dbh){
    $idcategoria = selectIdCategoria($dbh);
    $data = array('idcategoria' => $idcategoria);

    $stmt = $dbh->prepare("SELECT idSubcategoria,nomCategoria FROM Subcategoria
                           WHERE idCategoria = (SELECT idCategoria FROM categoria
                                                WHERE idCategoria = :idcategoria");
    $stmt->execute($data);
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $array;
}