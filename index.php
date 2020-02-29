<?php
    // esp32/pepito.php?nombre=Robert pepe
    
$servername = "ec2-35-172-85-250.compute-1.amazonaws.com";
$database = "d7pmm1dodikbv5";
$username = "ejxfckxmrixihs";
$password = "6e1eaa5b5aa1d10c3290bb1795f9263bb629a3bb80ffda285c33862603a95273";

$nombre = $_GET['nombre'];


// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=" . $servername . " dbname=" . $database . " user=". $username . " password=" . $password)
    or die('No se ha podido conectar: ' . pg_last_error());

// Realizando una consulta SQL
$query = "SELECT * FROM espcommands where ESPexecuted IS NULL AND espid like '" . $nombre . "' " ;
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

while($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
         $myArray[] = $row;
}
echo json_encode($myArray);

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);

//echo "<h2>Hola, desde Rosas-github</2>";
?>
