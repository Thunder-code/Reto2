
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
    lanzarConsulta($dbh);
}

function lanzarConsulta($dbh){

    $stmt = $dbh->prepare("SELECT * FROM Anuncio");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();
    echo "<table >";
    while ($row = $stmt ->fetch()){
        echo "<tr >
          <td>".$row->idAnuncio."</td>
          <td>".$row->imagen."</td>
          <td>".$row->titulo."</td>
          <td>".$row->descripcion."</td>
          <td>".$row->idSubcategoria."</td>
          <td>".$row->idEmpresa."</td>
          <td>".$row->idCategoria."</td>
        </tr>";
    }
    echo "</table >";
}