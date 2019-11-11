<!--<html>
<head>
    <title>Hola Mundo PHP</title>
</head>
<body>
<form action="empresa.php" method="get">

    Producto:
    <input type="text" name="nombre"><br>
    telefono:
    <input type="text" name="telefono"><br>
    emial
    <input type="text" name="email"><br>
    direccion
    <input type="text" name="direccion"><br>

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
    insert($dbh);
}

function insert($dbh){
    $data = array('nombre' => 'thunder', 'tel' => '98989897','email' => 'thunder@gmail.com', 'dire'=> 'calle algo 5º ');

    $stmt = $dbh->prepare("INSERT INTO Empresa (nomEmpresa, telefono, email, direccion) VALUES (:nombre, :tel, :email, :dire)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    echo "insert";
}