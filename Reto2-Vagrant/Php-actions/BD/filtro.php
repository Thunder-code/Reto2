<?php
/*function clausula($titulo,$categoria,$subcategoria,$empresa){

    $cla = "WHERE 1 = 1 ";
    if ($titulo != ""){
        $cla += " AND titulo = ".$titulo;
    }
    if ($categoria != ""){
        $cla += " AND c.idCategoria = ".$categoria;
    }
    if ($subcategoria != ""){
        $cla += " AND s.Subcategoria = ".$subcategoria;
    }
    if ($empresa != ""){
        $cla += " AND  nomEmpresa = ".$empresa;
    }

    return $cla;

}*/
//Cogemos todos los anuncios filtrados
function selectAnuncioInicial($dbh,$titulo,$categoria,$subcategoria,$empresa){
echo $titulo;
echo $categoria;
echo $subcategoria;
echo $empresa;


    $cla ="WHERE 1 = 1";
   /* $cla1 = " AND titulo = '$titulo'";
    $cla2 = " AND c.idCategoria = $categoria";
    $cla3 = " AND s.Subcategoria = $subcategoria";
    $cla4 = " AND nomEmpresa = '$empresa'";*/

    /*echo $cla = $cla.$cla1.$cla2.$cla3.$cla4;*/

  if($titulo != ""){
      $cla .= " AND titulo = '$titulo'";
  }
  if($categoria != "" /*|| $categoria != "--Elige una Categoria--"*/){
        $cla .= " AND c.idCategoria = $categoria";
    }
  if($subcategoria != ""){
        $cla .= " AND s.Subcategoria = $subcategoria";
    }
  if($empresa != ""){
        $cla .= " AND nomEmpresa = '$empresa'";
    }
   /* echo $cla1;
    echo $cla2;
    echo $cla3;
    echo $cla4;*/
    echo $cla;
    $data  = array('cla'=>$cla);

    $stmt = $dbh->prepare("select a.idAnuncio,a.titulo,a.descripcion,a.imagen,c.nomCategoria,e.nomEmpresa,s.nomSubcategoria 
                           From Anuncio as a
                           Inner join Empresa as e on a.idEmpresa = e.idEmpresa 
                           Inner join Categoria as c on a.idCategoria = c.idCategoria 
                           LEFT join Subcategoria as s on a.idSubcategoria = s.idSubcategoria $cla");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);

    echo "<div class='addAnuncio'>";
    while ($row = $stmt->fetch()) {
        echo "<div class='Anuncio'>
         <h2 class='tituloAnuncio'>" . $row->titulo . "</h2>
         <div class='descripcion'>" . $row->descripcion . "</div>
         <p class='imgAnuncio'><img src='../../imagenes/" . $row->imagen . "'></p>
         <div class='categoria'>" . $row->nomCategoria . "</div>
         <div class='empresa'>" . $row->nomEmpresa . "</div>
         <div class='subcategoria'>" . $row->nomSubcategoria . "</div>

         
         </div>";
    }
    echo "</div>";
}



