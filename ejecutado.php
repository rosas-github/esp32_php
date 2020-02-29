<?php

$servername = "ec2-35-172-85-250.compute-1.amazonaws.com";
$database = "d7pmm1dodikbv5";
$username = "ejxfckxmrixihs";
$password = "6e1eaa5b5aa1d10c3290bb1795f9263bb629a3bb80ffda285c33862603a95273";

$id = $_GET["id"]; //igual a nombre en consulta "select"


// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=" . $servername . " dbname=" . $database . " user=". $username . " password=" . $password)
    or die('Error - No se ha podido conectar: ' . pg_last_error());

// Realizando una consulta SQL
$query = "UPDATE espcommands SET espexecuted = 1 where id = '" . $id . "'" ;

$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
echo "Marcado como ejecutado correctamente";

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);

?>
