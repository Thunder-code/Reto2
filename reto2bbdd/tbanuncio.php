
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


function selectAnuncio($dbh){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $stmt = $dbh->prepare("select t1.titulo,t1.descripcion,t2.nomCategoria,t3.nomSubcategoria,t4.nomEmpresa 
                            From Anuncio t1, Categoria t2, Subcategoria t3,Empresa t4 where t1.idEmpresa =1 
                            and t1.idCategoria = t2.idCategoria 
                            and t1.idSubcategoria = t3.idSubcategoria 
                            and t1.idEmpresa = t4.idEmpresa)");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    echo "<table>";

    while ($row = $stmt ->fetch()){
        echo "<tr> 
          <td>".$row->titulo."</td>
          <td>".$row->descripcion."</td>
          <td>".$row->nomCategoria."</td>
          <td>".$row->nomSubcategoria."</td>
          <td>".$row->nomEmpresa."</td>
          </tr>";
    }
    echo "</table>";

}

function lanzarConsulta($dbh){

    $stmt = $dbh->prepare("SELECT * FROM Anuncio");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();
    echo "<table>";
    while ($row = $stmt ->fetch()){
        echo "<tr>
          <td>".$row->idAnuncio."</td>
          <td>".$row->imagen."</td>
          <td>".$row->titulo."</td>
          <td>".$row->descripcion."</td>
          <td>".$row->idSubcategoria."</td>
          <td>".$row->idEmpresa."</td>
          
        </tr>";
    }
    echo "</table>";
}