<?php
require_once("conexion.php");

@$id = $_POST['id'];
$sql = "DELETE FROM persona WHERE id_persona='$id' ";
mysqli_query($conexion, $sql);

$r = [];
if (mysqli_error($conexion) != "") {
	$r["error"] = true;
	$r["msg"] = mysqli_error($conexion);
} else {
	$r["error"] = false;
	$r["msg"] = "Registro eliminado con éxito.";
}
echo json_encode($r);
