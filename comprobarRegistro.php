<?php
function comprobarUsuario($dbh){
    $data = array("username" => $_POST["username"]);

    $stmt = $dbh->prepare("SELECT nomUsuario FROM Usuarios Where nomUsuario = :username");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ($data);

    $row = $stmt ->fetch();

    if ($row == null){
        echo ("<p>Usuario disponible</p>");
        return true;
    }else {
        echo("<p>Usuario no disponible</p>");
        return false;
    }
}

function comprobarContraseñas(){
    if($_POST["password"] == $_POST["password2"]){
        echo ("<p>Las contraseñas coinciden</p>");
        return true;
    }else {
        echo("<p>Las contraseñas no coinciden</p>");
        return false;
    }
}
?>
