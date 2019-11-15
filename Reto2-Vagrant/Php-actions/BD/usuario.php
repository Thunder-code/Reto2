<?php
function insertUsuario($dbh,$username,$pass){
    $data = array('username' => $username, 'pwd' => $pass);

    $stmt = $dbh->prepare("INSERT INTO Usuario (nomUsuario, password) VALUES (:username, :pwd)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}

function updateUsuario($dbh,$nomempresa){
    $data = array('nomempre' => $nomempresa);

    $stmt = $dbh->prepare(" UPDATE Usuario SET idEmpresa = (SELECT idEmpresa FROM Empresa WHERE nomEmpresa = :nomempre)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

}
?>