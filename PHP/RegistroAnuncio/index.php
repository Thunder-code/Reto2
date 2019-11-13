<?php
require "../BD/conexionBD.php";
require "../BD/anuncio.php";

$dbh = connect();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>index.php</title>
    </head>
    <body>
        <p>El anuncio se ha creado</p>
        <div><?php echo(selectAnuncio($dbh))?></div>
    </body>
</html>

