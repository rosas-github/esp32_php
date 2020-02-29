<?php


$servername = "ec2-52-202-185-87.compute-1.amazonaws.com";
$database = "d79gdtjvldehc6";
$username = "tsmjrcqunicnlx";
$password = "156c2dadd79b76cf6782243d0c90c1af4f3003ae32a1d0c12157f815517db330";

$espid = $_GET["espid"]; //igual a nombre en consulta "select"
$cmd = $_GET["cmd"];

// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=" . $servername . " dbname=" . $database . " user=". $username . " password=" . $password)
    or die('Error - No se ha podido conectar: ' . pg_last_error());

// Realizando una consulta SQL
//    INSERT INTO espcommands (espid, espcmd) VALUES ('Robert', 'LED_ON')
$query = "INSERT INTO espcommands (espid, espcmd) VALUES ('" . $espid . "', '" . $cmd . "' ) " ;
echo $query;

$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
echo "Insert fue correcto";

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);

?>