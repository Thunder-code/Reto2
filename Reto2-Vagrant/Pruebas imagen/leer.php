<?php
$conexion = new PDO('mysql:host=localhost;dbname=pruebaImagen;charset=UTF8', 'root', '');
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$consulta = "SELECT imagen FROM imagenes WHERE id='1';";
$hacerConsulta = $conexion->prepare($consulta); // Se crea un objeto PDOStatement.
$hacerConsulta->execute(); // Se ejecuta la consulta.
$datos = $hacerConsulta->fetch(PDO::FETCH_ASSOC)["imagen"]; // Se recuperan los resultados.
$hacerConsulta->closeCursor(); // Se libera el recurso.

$datos = base64_decode($datos);
echo $datos;
?>