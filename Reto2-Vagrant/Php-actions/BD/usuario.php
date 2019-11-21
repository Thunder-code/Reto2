<?php
session_start();
/*$usuarioSesion = $_SESSION['registro'];
$nomempresa =  $_SESSION['sesinempresa'];*/
//Funcion para insertar usuario a la base de datos
function insertUsuario($dbh,$username,$pass){
    $data = array('username' => $username, 'pwd' => $pass);

    $stmt = $dbh->prepare("INSERT INTO Usuario (nomUsuario, password) VALUES (:username, :pwd)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}
//Funcion para actualizar usuario en la base de datos
function updateUsuario($dbh,$usuarioSesion,$nomempresa){
    $data = array('nomusu' => $usuarioSesion,'nomempresa' => $nomempresa);

    $stmt = $dbh->prepare("UPDATE Usuario SET idEmpresa = (SELECT idEmpresa FROM Empresa WHERE nomEmpresa = :nomempresa) where nomUsuario = :nomusu");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

}

//Funcion para mostar los datos del usuario con la respectiva empresa

function datosUsuario ($dbh,$ususesion){
    $data = array('ususesion' =>$ususesion);

    $stmt = $dbh->prepare("Select u.idUsuario, u.nomUsuario,u.password,u.idEmpresa,e.nomEmpresa,e.telefono,e.email,e.direccion 
                                     FROM Usuario as u 
                                     LEFT join Empresa as e on u.idEmpresa = e.IdEmpresa where u.nomUsuario = :ususesion");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

    echo "<div class='Usuario'>";
    while ($row = $stmt->fetch()) {
        echo "<div class='DtoUsuario'>
         <h2 class='nomUsuario'>" . $row->nomUsuario . "</h2>
         <div class='empresa'>" . $row->nomEmpresa . "</div>
         <div class='telefono'>" . $row->telefono . "</div>
         <div class='email'>" . $row->email . "</div>
         <div class='direccion'>" . $row->direccion . "</div>
         </div>";
    }
    echo "</div>";
}


?>