<?php
function clausula($titulo,$categoria,$subcategoria,$empresa){

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

}

function selectAnuncioInicial($dbh,$cla){

$data = array("cla"=> $cla);
    $stmt = $dbh->prepare("select a.idAnuncio,a.titulo,a.descripcion,a.imagen,c.nomCategoria,e.nomEmpresa,s.nomSubcategoria 
                           From Anuncio as a
                           Inner join Empresa as e on a.idEmpresa = e.idEmpresa 
                           Inner join Categoria as c on a.idCategoria = c.idCategoria 
                           LEFT join Subcategoria as s on a.idSubcategoria = s.idSubcategoria :cla");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute($data);
    echo $cla;
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



