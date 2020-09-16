<?php
require_once("conexion.php");


@$id = $_POST['id_tipo_identidad'];
$sql = "DELETE FROM tipo_identidad WHERE id_tipo_identidad='$id' ";
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