<?php
connect();
function connect(){
    $dbname="reto2";
    $host="localhost";
    $user="root";
    $pass="";
    try {
        #MySQL
        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }
    $idcategoria = select($dbh);
    echo $idcategoria;
    insert($dbh,$idcategoria);
}


function select ($dbh){
    $stmt = $dbh->prepare("SELECT idCategoria FROM Categoria Where nomCategoria = 'motor'");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $idcategoria = $row->idCategoria;
    }
    return $idcategoria;
}

function insert($dbh,$idcategoria){
    $data = array('nomSubCat' => 'motos', 'idCategoria' => $idcategoria);
    $stmt = $dbh->prepare("INSERT INTO Subcategoria (nomSubcategoria,idCategoria) VALUES (:nomSubCat, :idCategoria)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    echo "insert";

}