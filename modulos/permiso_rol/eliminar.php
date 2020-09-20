<?php
$id_permiso_rol = $_POST['id'];
$sql = "DELETE FROM permiso_rol WHERE id_permiso_rol ='$id_permiso_rol'";
mysqli_query($conexion, $sql);

$resultado = [];
if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["msg"] = "Datos eliminados con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["msg"] = mysqli_error($conexion);
}
echo json_encode($resultado);
