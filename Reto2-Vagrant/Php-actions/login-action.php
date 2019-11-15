<?php
$isLoginIncorrecto = "";
$tipo ="";

$usuario = $_POST["usuario"];
$password = $_POST["password"];

function comprobarLogin ($dbh, $usuario,$password){
    $data = array("usuario" => $usuario,
                  "password" => $password);

    $stmt = $dbh->prepare("SELECT nomUsuario,password FROM Usuario Where nomUsuario = :usuario AND password = :password");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

    $row = $stmt->fetch();

    if($row == null){
        $isLoginIncorrecto = true;

        require "../html/login.php";

    }
      else {
        $isLoginIncorrecto = false;
        $tipo = "user";
        require "../html/index.php";

    }
}
include "conexionBD.php";
$dbh = connect();
comprobarLogin($dbh,$usuario,$password);

?>