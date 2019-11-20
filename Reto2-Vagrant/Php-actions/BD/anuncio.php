<?php
//Funcion para insertar un anuncio
function insertAnuncio($dbh,$titulo,$descripcion,$categoria,$nombreFoto){
    $data = array('descripcion' => $descripcion, 'titulo'=> $titulo,'idempresa' => '1', 'idcategoria' => $categoria,'imagen' => $nombreFoto);
    print_r($data);
    $stmt = $dbh->prepare("INSERT INTO Anuncio (imagen,titulo,descripcion,idEmpresa,idCategoria) VALUES (:imagen,:titulo,:descripcion,:idempresa,:idcategoria)") ;
    $stmt->execute($data);
}
//Carga inicial de anuncions en la pagina principal
function selectAnuncioInicial1($dbh){
    //seleccionamos todos los atributos del anuncio
    $stmt = $dbh->prepare("select a.idAnuncio,a.titulo,a.descripcion,a.imagen,c.nomCategoria,e.nomEmpresa,s.nomSubcategoria, e.telefono, e.email
                           From Anuncio as a
                           Inner join Empresa as e on a.idEmpresa = e.idEmpresa 
                           Inner join Categoria as c on a.idCategoria = c.idCategoria 
                           LEFT join Subcategoria as s on a.idSubcategoria = s.idSubcategoria");
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "<div class='Anuncio'>
        <div class='contenedorinformacion'>
            <h2 class='tituloAnuncio'>" . $row->titulo . "</h2>
               <div class='oculto'>
                    <div class='nomEmpresa'>" . "<p> Empresa: </p>" .  $row->nomEmpresa . "</div>
                    <div class='nomCategoria'>" . "<p> Categoria: </p>" .  $row->nomCategoria . "</div>
                    <div class='nomSubcategoria'>". "<p> Subcategoria: . </p>" .  $row->nomSubcategoria . "</div>
                     <div class='telefono'>" . "<p> Telefono: </p>" .  $row->telefono . "</div>
                      <div class='email'>" . "<p> Email: </p>" .  $row->email . "</div>
                       <div class='descripcion'>" . "<p> Descripcion: </p>" .  $row->descripcion . "</div>
                   
                   
               </div>
        
        </div>
               <div class='imgAnuncio'><img   class='imagen' src='../../imagenes/" . $row->imagen . "'></div>
         </div>";
    }
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

