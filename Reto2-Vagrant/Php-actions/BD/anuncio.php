<?php
function insertAnuncio($dbh,$titulo,$descripcion,$categoria){
    $data = array('descripcion' => $descripcion, 'titulo'=> $titulo,'idempresa' => '1', 'idcategoria' => $categoria);

    $stmt = $dbh->prepare("INSERT INTO Anuncio (titulo,descripcion,idEmpresa,idCategoria) VALUES (:titulo,:descripcion,:idempresa,:idcategoria)") ;
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
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

