<?php
require_once("conexion.php");
$id_permiso_rol = $_POST['id_permiso_rol'];

$sql = "DELETE FROM permiso_rol WHERE id_permiso_rol ='$id_permiso_rol'";

mysqli_query($conexion,$sql);

$resultado=[];
if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["mensaje"] = "Datos eliminados con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["mensaje"] = mysqli_error($conexion);
}
// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);


