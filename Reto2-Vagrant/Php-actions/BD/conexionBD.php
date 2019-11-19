<?php

//Conexion a la base de datos
function connect(){
    $dbname="reto2";
    $host="localhost";
    $user="root";
    $pass="";
    try {
        #MySQL
        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        return $dbh;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }
}
?>