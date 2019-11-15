<?php
function insertEmpresa($dbh,$nombre,$email,$telefono,$direccion){
    $data = array('nombre' => $nombre,'email' => $email,'telefono' => $telefono,'direccion'=> $direccion);

    $stmt = $dbh->prepare("INSERT INTO Empresa (nomEmpresa, telefono, email, direccion) VALUES (:nombre, :telefono, :email, :direccion)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}

function updateUsuario($dbh,$nomempresa){
    $data = array('nomempre' => $nomempresa);

    $stmt = $dbh->prepare(" UPDATE Usuario SET idEmpresa = (SELECT idEmpresa FROM Empresa WHERE nomEmpresa = :nomempre)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

}