<?php
//Funcion para insertar un anuncio
function insertAnuncio($dbh,$titulo,$descripcion,$categoria,$subcategoria,$nombreFoto){
    $data = array('descripcion' => $descripcion, 'titulo'=> $titulo,'idempresa' => '1', 'idcategoria' => $categoria,'subcategoria' => $subcategoria,'imagen' => $nombreFoto);
    print_r($data);
    $stmt = $dbh->prepare("INSERT INTO Anuncio (imagen,titulo,descripcion,idEmpresa,idCategoria,idSubcategoria) VALUES (:imagen,:titulo,:descripcion,:idempresa,:idcategoria,:subcategoria)") ;
    $stmt->execute($data);
}
//Carga inicial de anuncions en la pagina principal
function selectAnuncioInicial1($dbh)
{
    //seleccionamos todos los atributos del anuncio
    $stmt = $dbh->prepare("select a.idAnuncio,a.titulo,a.descripcion,a.imagen,c.nomCategoria,e.nomEmpresa,s.nomSubcategoria, e.telefono, e.email
                           From Anuncio as a
                           Inner join Empresa as e on a.idEmpresa = e.idEmpresa 
                           Inner join Categoria as c on a.idCategoria = c.idCategoria 
                           LEFT join Subcategoria as s on a.idSubcategoria = s.idSubcategoria");
    $stmt->execute();
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $array;
}
//Selecionamos los anuncios que nos llegan de los filtros
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
function deleteAnuncio ($dbh,$idanuncio){
    $data = array('idanuncio' => $idanuncio);
    $stmt = $dbh->prepare("delete from Anuncio Where idAnuncio = :idAnuncio");
    $stmt->execute($data);



}

?>

