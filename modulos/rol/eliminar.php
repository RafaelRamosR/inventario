<?php
$id_rol = $_POST['id'];
$sql = "DELETE FROM rol WHERE id_rol ='$id_rol'";

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
