<?php
session_start();
//Funcion para insertar empresa
function insertEmpresa($dbh,$nombre,$email,$telefono,$direccion){
    $data = array('nombre' => $nombre,'email' => $email,'telefono' => $telefono,'direccion'=> $direccion);

    $stmt = $dbh->prepare("INSERT INTO Empresa (nomEmpresa, telefono, email, direccion) VALUES (:nombre, :telefono, :email, :direccion)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}

function selectIdEmpresa($dbh){
    $data = array('nomusuario' => $_SESSION['registro']);
    $stmt = $dbh->prepare("select idEmpresa 
                           From Usuario
                           where nomUsuario = usu4");
    $stmt->execute($data);

    $stmt->setFetchMode(PDO::FETCH_OBJ);

    while ($row = $stmt->fetch()) {
        $idEmpresa = $row->idEmpresa;
    }
    return $idEmpresa;
}