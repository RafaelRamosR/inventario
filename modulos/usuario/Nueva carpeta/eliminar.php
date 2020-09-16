<?php
require_once("conexion.php");
$id_user = $_POST['id_user'];
$sql = "DELETE FROM user WHERE id_user ='$id_user'";

mysqli_query($conexion,$sql);
$resultado=[];
if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["mensaje"] = "Datos eliminados del user con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["mensaje"] = mysqli_error($conexion);
}
// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);
