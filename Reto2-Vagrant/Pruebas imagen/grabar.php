<?php
/* Se conecta con la base de datos elegida. */
$conexion = new PDO('mysql:host=localhost;dbname=pruebaImagen;charset=UTF8', 'root', '');
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$datos = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));

try{
    $consulta = "INSERT INTO imagenes (";
    $consulta .= "imagen";
    $consulta .= ") VALUES (";
    $consulta .= "'".$datos."');";
    $conexion->query($consulta);
} catch (Exception $e) {
    die ("Se produjo un error");
}

echo "Imagen almacenada.";
?>