<?php
    // esp32/pepito.php?nombre=Robert pepe
    
$servername = "ec2-52-202-185-87.compute-1.amazonaws.com";
$database = "d79gdtjvldehc6";
$username = "tsmjrcqunicnlx";
$password = "156c2dadd79b76cf6782243d0c90c1af4f3003ae32a1d0c12157f815517db330";

$nombre = $_GET['nombre'];


// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=" . $servername . " dbname=" . $database . " user=". $username . " password=" . $password)
    or die('No se ha podido conectar: ' . pg_last_error());

// Realizando una consulta SQL
$query = "SELECT * FROM espcommands where espexecuted IS NULL AND espid like '" . $nombre . "' " ;
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

while($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
         $myArray[] = $row;
}
echo json_encode($myArray);

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);
?>