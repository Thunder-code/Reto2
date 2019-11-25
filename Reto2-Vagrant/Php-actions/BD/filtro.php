<?php
//Cogemos todos los anuncios filtrados
function selectAnuncioFiltro($dbh,$titulo,$categoria,$subcategoria,$empresa){
    $cla ="WHERE 1 = 1";

  if($titulo != ""){
      $cla .= " AND titulo LIKE '%$titulo%'";
  }
  if($categoria != ""){
        $cla .= " AND c.idCategoria = $categoria";
    }
  if($subcategoria != ""){
        $cla .= " AND s.idSubcategoria = $subcategoria";
    }
  if($empresa != ""){
        $cla .= " AND nomEmpresa LIKE '%$empresa%'";
    }

    $data  = array('cla'=>$cla);

    $stmt = $dbh->prepare("select a.idAnuncio,a.titulo,a.descripcion,a.imagen,c.nomCategoria,e.nomEmpresa,s.nomSubcategoria 
                           From Anuncio as a
                           Inner join Empresa as e on a.idEmpresa = e.idEmpresa 
                           Inner join Categoria as c on a.idCategoria = c.idCategoria 
                           LEFT join Subcategoria as s on a.idSubcategoria = s.idSubcategoria $cla");
    $stmt->execute($data);
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $array;

}



