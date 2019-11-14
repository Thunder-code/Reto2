<?php
function insertUsuario($dbh,$username,$pass){
    $data = array('username' => $username, 'pwd' => $pass);

    $stmt = $dbh->prepare("INSERT INTO Usuario (nomUsuario, password) VALUES (:username, :pwd)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}
?>