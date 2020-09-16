<?php
require_once("conexion.php");


@$id = $_POST['id_producto'];
$sql = "DELETE FROM producto WHERE id_producto='$id' ";
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