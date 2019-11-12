<?php

function insertEmpresa($dbh,$nombre,$email,$telefono,$direccion){
    $data = array('nombre' => $nombre, 'email'=> $email, 'telefono' => $telefono, 'direccion' => $direccion);
    $stmt = $dbh->prepare("INSERT INTO Empresa (nomEmpresa,email,telefono,direccion) VALUES (:nombre,:email,:telefono,:direccion)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}