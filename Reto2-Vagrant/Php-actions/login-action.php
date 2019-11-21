<?php
$isLoginIncorrecto = "";
$tipo ="";

$usuario = $_POST["usuario"];
$password = $_POST["password"];
//Funcion para comprobar los datos del login con la base de datos
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
require_once "BD/conexionBD.php";
$dbh = connect();
comprobarLogin($dbh,$usuario,$password);


session_start();


$_SESSION['registro'] = $usuario;
echo "Hola" .  isset($_SESSION['registro']) ? $_SESSION['registro']: "nada". "dd";



?>