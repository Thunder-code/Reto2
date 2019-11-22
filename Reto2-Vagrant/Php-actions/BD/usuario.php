<?php
session_start();
//Funcion para insertar usuario a la base de datos
function insertUsuario($dbh,$username,$pass){
    $data = array('username' => $username, 'pwd' => $pass);

    $stmt = $dbh->prepare("INSERT INTO Usuario (nomUsuario, password) VALUES (:username, :pwd)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}
//Funcion para actualizar usuario en la base de datos
function updateUsuario($dbh,$nomempresa){
    $nomUsuario = $_SESSION['registro'];
    $data = array('nomempre' => $nomempresa,'nomusu' => $nomUsuario);

    $stmt = $dbh->prepare("UPDATE Usuario SET idEmpresa = (SELECT idEmpresa FROM Empresa WHERE nomEmpresa = :nomempre) where nomUsuario = :nomusu");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

}

//Funcion para mostar los datos del usuario con la respectiva empresa
function datosUsuario ($dbh,$usuregis){
    $data = array('usuregis'=> $usuregis);

    $stmt = $dbh->prepare("Select u.idUsuario, u.nomUsuario,u.password,u.idEmpresa,e.nomEmpresa,e.telefono,e.email,e.direccion 
                                     FROM Usuario as u 
                                     LEFT join Empresa as e on u.idEmpresa = e.IdEmpresa where u.nomUsuario = :usuregis");
    $stmt->execute($data);
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $array;
/*
    while ($row = $stmt->fetch()) {
        echo "<div class='DtoUsuario'>
         <h2 class='nomUsuario'>" . $row->nomUsuario . "</h2>
         <div class='empresa'>" . $row->nomEmpresa . "</div>
         <div class='telefono'>" . $row->telefono . "</div>
         <div class='email'>" . $row->email . "</div>
         <div class='direccion'>" . $row->direccion . "</div>
         </div>";
    }
*/
}


?>