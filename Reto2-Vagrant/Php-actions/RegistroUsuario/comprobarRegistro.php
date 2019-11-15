<?php
require "../BD/conexionBD.php";
require "../BD/usuario.php";

$dbh = connect();
$username = "";
$pass = "";
$malRegistro = "";

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"])){
    $username = comprobarUsuario($dbh);
    $pass = comprobarContraseñas();

    if($username == true && $pass == true){
        insertUsuario($dbh,$_POST["username"],$_POST["password"]);
        include "index.php";
    }else {
        $malRegistro = true;
        include "registro.php";
    }
}

function comprobarUsuario($dbh){
    $data = array("username" => $_POST["username"]);

    $stmt = $dbh->prepare("SELECT nomUsuario FROM Usuario Where nomUsuario = :username");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ($data);

    $row = $stmt ->fetch();

    if ($row == null){
        return true;
    }else {
        return false;
    }
}

function comprobarContraseñas(){
    if($_POST["password"] == $_POST["password2"]){
        return true;
    }else {
        return false;
    }
}
?>
