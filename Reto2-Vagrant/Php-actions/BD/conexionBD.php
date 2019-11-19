<?php
function connect(){
    $dbname="reto2";
    $host="localhost";
    $user="thunder";
    $pass="12345";
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