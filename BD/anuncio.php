<!--<html>
<head>
    <title>Hola Mundo PHP</title>
</head>
<body>
<form action="usuario.php" method="get">

    Producto:
    <input type="text" name="nombre"><br>
    Passsword:
    <input type="text" name="pwd"><br>
    <input type="submit" value="Enviar" name="enviar">

</form>
</body>
</head>
</html>-->



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
    $idempesa = select($dbh);
    $idcategoria = selectCategoria($dbh);
    $idsubcategoria = selectSubcategoria($dbh);
    echo $idempesa;
    echo $idcategoria;
    echo $idsubcategoria;
    insert($dbh,$idempesa,$idcategoria,$idsubcategoria);
}


function select ($dbh){
    $stmt = $dbh->prepare("SELECT idEmpresa FROM Empresa Where nomEmpresa = 'thunder'");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $idempresa = $row->idEmpresa;
    }
    return $idempresa;
}

function selectCategoria ($dbh){
    $stmt = $dbh->prepare("SELECT idCategoria FROM Categoria Where nomCategoria = 'motor'");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $idcategoria = $row->idCategoria;
    }
    return $idcategoria;
}

function selectSubcategoria($dbh){
    $stmt = $dbh->prepare("SELECT idSubcategoria FROM Subcategoria Where nomSubcategoria = 'motos'");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $idsubcategoria = $row->idSubcategoria;
    }
    return $idsubcategoria;
}

function insert($dbh,$idempesa,$idcategoria,$idsubcategoria){
    $data = array('descri' => 'Aritz bobo', 'titu'=> 'TQ','idempresa' => $idempesa, 'idcategoria' => $idcategoria, 'idsubcategoria' => $idsubcategoria);

    $stmt = $dbh->prepare("INSERT INTO Anuncio (descripcion,titulo,idEmpresa,idCategoria,idSubcategoria) VALUES (:descri, :titu, :idempresa,:idcategoria,:idsubcategoria)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    echo "insert";

}
