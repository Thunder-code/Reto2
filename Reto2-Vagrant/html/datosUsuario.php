<?php
    require "../Php-actions/BD/conexionBD.php";
    require "../Php-actions/BD/usuario.php";
    require_once "header.php";
    $dbh = connect();
    session_start();
?>

<meta charset="UTF-8">
<script src="../javascript/jquery-3.4.1.min.js"></script>
<script src="../javascript/llenarSubcategorias.js"></script>
<link rel="stylesheet" href="../CSS/perfil.css">
<link rel="stylesheet" href="../CSS/global.css">
<link rel="stylesheet" href="../CSS/header.css">

<div class="contenedor">
    <div id="perfil" class="cPerfil">
        <div class="contenido">
            <div class="tituloFormulario"><h2><?= $_SESSION['registro'];?></h2></div>
            <div class="datosPerfil">
                <p class="nombreDatos">Datos de la Empresa:</p>
                <?php
                $usuregis = $_SESSION['registro'];
                $datosUsuario = datosUsuario($dbh,$usuregis);
                foreach ($datosUsuario as $row) {
                    echo "<div><p><strong> Nombre: </strong>" . $row["nomEmpresa"] . "</p></div>
                    <div><p><strong> Telefono: </strong>" . $row["telefono"] . "</p></div>
                    <div><p><strong> Email: </strong>" . $row["email"] . "</p></div>
                    <div><p><strong> Direccion: </strong>" . $row["direccion"] . "</p></div>";
                }?>
            </div>
        </div>
    </div>
</div>
<?php
require_once "footer.php";
?>