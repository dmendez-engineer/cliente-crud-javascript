<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//-------------------
include("conectar.php");
$arr = array();
$consulta="SELECT * from CLIENTE";
$ejecutar = sqlsrv_query($conn, $consulta);


while($fila = sqlsrv_fetch_array($ejecutar)){
	
    array_push($arr,$fila);
  
}


echo json_encode($arr);

?>