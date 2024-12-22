<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador Visites</title>
</head>
<body>
<?php
    date_default_timezone_set('Europe/Madrid');
    $fecha = date("d/m/Y H:i:s");
    if (isset($_COOKIE["visita"])) {
        list($contador, $ultimaVisita) = explode("|", $_COOKIE["visita"]);
        $contador++;

        echo "<h2> Hola de nou, és la visita nº: $contador</h2>";
        echo "<h2>La data actual de l'última visita és: $ultimaVisita</h2>";
        setcookie("visita", "$contador|$fecha", time() + 3600 * 24 * 30);
    } else {
        echo "<h2> Hola, aquesta és la primera vegada que entres en aquesta pàgina. </h2>";
        setcookie("visita", "1|$fecha", time() + 3600 * 24 * 30); 
        echo "<h2>$fecha</h2>";
    }
?>

</body>
</html>