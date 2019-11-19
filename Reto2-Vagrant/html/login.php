



<html>
    <head>
       <!-- <link rel="stylesheet" href="/CSS/normalize.css">-->
        <link rel="stylesheet" href="/CSS/global.css">
        <link rel="stylesheet" href="/CSS/login.css">

        <script src="../javascript/jquery-3.4.1.min.js"></script>
        <script src="../javascript/login.js"></script>


     <title>Login</title>

    </head>
    <body>

    <?php
    function mensajeLogin($isLoginIncorrecto){
        if ($isLoginIncorrecto == true){
            $mensaje = "Datos Incorrectos";
            return $mensaje;
        } else {
            $mensaje = "";
            return $mensaje;
        }
    }
    ?>

    <img class="wallpaper" src="../multimedia/ny-wallpaper.jpg" id="wallpaper">
    <div class="container">
        <div class="izquierda">

             <div class="contenedorFormulario" id="cFormulario">
                 <div class="headerFormulario"> <h1>CONTECTATE</h1></div>
                 <form id="form" action="/Php-actions/login-action.php" method="post">
                     <div class="inputsFormulario">
                         <input type="text" id='usuario' name='usuario' placeholder="Usuario">
                         <input type="password" id='password' name='password' placeholder="Contraseña" >
                     </div>
                     <div class="extrasFormulario">
                         <a href="../Php-actions/RegistroUsuario/resgitroUsuario.php">Registrate</a>
                         <a href="index.php?tipo=guest">Entra como invitado</a>
                     </div>
                   <?php if($isLoginIncorrecto==true){
                       echo "<div class='mensajeError'>" . "<p>" .  mensajeLogin($isLoginIncorrecto). "</p>". " </div>";
                   } ?>
                     <div class="botonFormulario">
                         <input type="submit" value="Login">
                     </div>
                 </form>
            </div>

        </div>
        <div class="derecha">
                <div class="diagonalLogoContainer" id="dlc">
                    <img id="logo" src="../multimedia/ThunderCode.png">
                </div>
            </div>
    </div>
    </body>


</html>
<?php


/*
function select ($dbh){
    $stmt = $dbh->prepare("SELECT idEmpresa FROM Empresa Where nomEmpresa = 'thunder'");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute ();

    while ($row = $stmt ->fetch()){
        $idempresa = $row->idEmpresa;
    }
    return $idempresa;
}*/

?>