<?php
function insertAnuncio($dbh,$titulo,$descripcion,$categoria,$imagen){
    $data = array('imagen' => $imagen,'descripcion' => $descripcion, 'titulo'=> $titulo,'idempresa' => '1', 'idcategoria' => $categoria);

    $stmt = $dbh->prepare("INSERT INTO Anuncio (imagen,titulo,descripcion,idEmpresa,idCategoria) VALUES (:imagen,:titulo,:descripcion,:idempresa,:idcategoria)") ;
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
         <p>".$row->titulo."</p>
         <p>".$row->descripcion."</p>
         <p>".$row->imagen."</p>
         <p>".$row->nomCategoria."</p>
         <p>".$row->nomEmpresa."</p>
         <p>".$row->nomSubcategoria."</p>
         </div>";
    }
    echo "</div>";
}

*/

function selectAnuncioInicial($dbh){
    $stmt = $dbh->prepare("select a.idAnuncio,a.titulo,a.descripcion,a.imagen,c.nomCategoria,e.nomEmpresa,s.nomSubcategoria 
                           From Anuncio as a
                           Inner join Empresa as e on a.idEmpresa = e.idEmpresa 
                           Inner join Categoria as c on a.idCategoria = c.idCategoria 
                           LEFT join Subcategoria as s on a.idSubcategoria = s.idSubcategoria");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    echo "<div class='addAnuncio'>";
    while ($row = $stmt->fetch()) {
        echo "<div class='Anuncio'>
         <h2 class='tituloAnuncio'>" . $row->titulo . "</h2>
         <div class='descripcion'>" . $row->descripcion . "</div>
         <p class='imgAnuncio'><img src='" . $row->imagen . "'></p>
         </div>";
    }
    echo "</div>";
}

function selectAnuncioFiltrado($dbh){
    $stmt = $dbh->prepare("select a.idAnuncio,a.titulo,a.descripcion,a.imagen,c.nomCategoria,e.nomEmpresa,s.nomSubcategoria 
                           From Anuncio as a
                           Inner join Empresa as e on a.idEmpresa = e.idEmpresa 
                           Inner join Categoria as c on a.idCategoria = c.idCategoria 
                           LEFT join Subcategoria as s on a.idSubcategoria = s.idSubcategoria " );

    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    echo "<div class='addAnuncio'>";
    while ($row = $stmt->fetch()) {
        echo "<div class='Anuncio'>
         <h2 class='tituloAnuncio'>" . $row->titulo . "</h2>
         <div class='descripcion'>" . $row->descripcion . "</div>
         <p class='imgAnuncio'>" . $row->imagen . "</p>
          <p class='imgAnuncio'>" . $row->nomEmpresa . "</p>
         <p class='imgAnuncio'>" . $row->nomCategoria . "</p>
         <p class='imgAnuncio'>" . $row->nomSubcategoria . "</p>
         </div>";
    }
    echo "</div>";
}




?>


