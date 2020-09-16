<?php
require_once("conexion.php");


@$id_proveedor = $_POST['id_proveedor'];
$sql = "DELETE FROM proveedor WHERE id_proveedor='$id_proveedor' ";
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