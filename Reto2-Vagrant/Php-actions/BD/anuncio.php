<?php
function insertAnuncio($dbh,$titulo,$descripcion,$categoria){
    $data = array('descripcion' => $descripcion, 'titulo'=> $titulo,'idempresa' => '1', 'idcategoria' => $categoria);

    $stmt = $dbh->prepare("INSERT INTO Anuncio (titulo,descripcion,idEmpresa,idCategoria) VALUES (:titulo,:descripcion,:idempresa,:idcategoria)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
}
/*
function selectAnuncio($dbh){
    $stmt = $dbh->prepare("select t1.titulo,t1.descripcion,t2.nomCategoria,t3.nomSubcategoria,t4.nomEmpresa 
                            From Anuncio t1, Categoria t2, Subcategoria t3,Empresa t4 where t1.idEmpresa =1 
                            and t1.idCategoria = t2.idCategoria 
                            and t1.idSubcategoria = t3.idSubcategoria 
                            and t1.idEmpresa = t4.idEmpresa");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    echo "<div>";
    while ($row = $stmt ->fetch()){
        echo "<div>
         <p>".$row->titulo."</p>
         <p>".$row->descripcion."</p>
         <p>".$row->nomCategoria."</p>
         <p>".$row->nomSubcategoria."</p>
         <p>".$row->nomEmpresa."</p>
         </div>";
    }
    echo "</div>";

}

function selectAnuncio2($dbh){

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

}*/
?>


