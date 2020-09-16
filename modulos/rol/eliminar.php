<?php
require_once("conexion.php");
$id_rol = $_POST['id_rol'];
$sql = "DELETE FROM rol WHERE id_rol ='$id_rol'";

mysqli_query($conexion,$sql);
$resultado=[];
if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["msg"] = "Datos eliminados con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["msg"] = mysqli_error($conexion);
}
// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);


