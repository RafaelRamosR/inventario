<?php
$id_modulo_accion = $_POST['id'];
$sql = "DELETE FROM modulo_accion WHERE id_modulo_accion ='$id_modulo_accion'";

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
