<?php

include_once 'dbconfig.php';

@$idSec = $_POST['idSec'];
//Creamos la conexión
$conexion = mysqli_connect($db_host, $db_user, $db_pass,$db_name) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT cuotas_iniciales FROM sucursales WHERE id = ".$idSec;
//mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$clientes = array(); //creamos un array

while($row = mysqli_fetch_array($result)) 
{ 
	$clientes = $row['cuotas_iniciales']; 
}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
//$clientes['clientes'] = $clientes;
//$json_string = json_encode($clientes);
//echo $json_string
echo '{"data":['.$clientes.']}';
//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'clientes.json';
file_put_contents($file, $json_string);
*/
	

?>