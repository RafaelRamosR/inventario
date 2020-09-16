<?php
require_once("conexion.php");
$id_modulo_accion = $_POST['id_modulo_accion'];
$sql = "DELETE FROM modulo_accion WHERE id_modulo_accion ='$id_modulo_accion'";

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


