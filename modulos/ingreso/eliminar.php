<?php
require_once("conexion.php");


@$id = $_POST['id_ingreso'];
$sql = "DELETE FROM ingreso WHERE id_ingreso='$id' ";
mysqli_query($conexion, $sql);



$r =[];
if(mysqli_error($conexion)!="" ) {
	$r["error"]=true;
	$r["msg"] = mysqli_error($conexion);
 } else {

	$r["error"]=false;
	$r["msg"] = "Registro eliminado con éxito.";
 }
echo json_encode($r);


?>