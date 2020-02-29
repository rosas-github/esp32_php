<?php

$servername = "ec2-35-172-85-250.compute-1.amazonaws.com";
$database = "d7pmm1dodikbv5";
$username = "ejxfckxmrixihs";
$password = "6e1eaa5b5aa1d10c3290bb1795f9263bb629a3bb80ffda285c33862603a95273";

$espid = $_GET["espid"]; //igual a nombre en consulta "select"
$cmd = $_GET["cmd"];

// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=" . $servername . " dbname=" . $database . " user=". $username . " password=" . $password)
    or die('Error - No se ha podido conectar: ' . pg_last_error());

// Realizando una consulta SQL
//    INSERT INTO espcommands (espid, espcmd) VALUES ('Robert', 'LED_ON')
$query = "INSERT INTO espcommands (espid, espcmd) VALUES ('" . $espid . "', '" . $cmd . "' ) " ;
echo $query;
//echo $query;

$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
echo "Insert fue correcto";

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);

?>
