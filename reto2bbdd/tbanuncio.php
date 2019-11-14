
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
    selectAnuncioInicial($dbh);
}


function selectAnuncio($dbh){

    $stmt = $dbh->prepare("select t1.titulo,t1.descripcion,t2.nomCategoria,t3.nomSubcategoria,t4.nomEmpresa 
                            From Anuncio t1, Categoria t2, Subcategoria t3,Empresa t4 where t1.idEmpresa =1 
                            and t1.idCategoria = t2.idCategoria 
                            and t1.idSubcategoria = t3.idSubcategoria 
                            and t1.idEmpresa = t4.idEmpresa");
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

function lanzarConsulta1($dbh){

    $stmt = $dbh->prepare("SELECT t1.idAnuncio,t1.imagen,t1.titulo,t1.descripcion,t1.idSubcategoria,t2.nomEmpresa,t1.idCategoria FROM Anuncio t1, Empresa t2 WHERE t1.idEmpresa = t2.idEmpresa");
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
          <td>".$row->nomEmpresa."</td>
          <td>".$row->idCategoria."</td>
        </tr>";
    }
    echo "</table>";
}



function selectAnuncios($dbh){
    $stmt = $dbh->prepare("select a.idAnuncio,a.titulo,a.descripcion,a.imagen,c.nomCategoria,e.nomEmpresa,s.nomSubcategoria 
                           From Anuncio as a
                           Inner join Empresa as e on a.idEmpresa = e.idEmpresa 
                           Inner join Categoria as c on a.idCategoria = c.idCategoria 
                           LEFT join Subcategoria as s on a.idSubcategoria = s.idSubcategoria");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    echo "<div>";
    while ($row = $stmt ->fetch()){
        echo "<div>
         <h2>".$row->titulo."</h2>
         <p>".$row->descripcion."</p>
         <p>".$row->imagen."</p>
         <p>".$row->nomCategoria."</p>
         <p>".$row->nomEmpresa."</p>
         <p>".$row->nomSubcategoria."</p>
         </div>";
    }
    echo "</div>";
}

function selectAnuncioInicial($dbh){
    $stmt = $dbh->prepare("select a.idAnuncio,a.titulo,a.descripcion,a.imagen,c.nomCategoria,e.nomEmpresa,s.nomSubcategoria 
                           From Anuncio as a
                           Inner join Empresa as e on a.idEmpresa = e.idEmpresa 
                           Inner join Categoria as c on a.idCategoria = c.idCategoria 
                           LEFT join Subcategoria as s on a.idSubcategoria = s.idSubcategoria");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    echo "<div class='addAnuncio'>";
    while ($row = $stmt ->fetch()){
        echo "<div class='Anuncio'>
         <h2 class='tituloAnuncio'>".$row->titulo."</h2>
         <div class='descripcion'>".$row->descripcion."</div>
         <p class='imgAnuncio'>".$row->imagen."</p>
         </div>";
    }
    echo "</div>";
}



