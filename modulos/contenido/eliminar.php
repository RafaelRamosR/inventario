<?php
require_once("conexion.php");

$id_contenido = $_POST['id_contenido'];

$sql = "DELETE FROM  contenido WHERE id_contenido ='$id_contenido'";

mysqli_query($conexion, $sql);
$respuesta = [];
if (mysqli_error($conexion) == "") {
    $respuesta['error'] = false;
    $respuesta['msg'] = "Registro eliminado con éxito.";
} else {
    $respuesta['error'] = true;
    $respuesta['msg'] = mysqli_error($conexion);
}
echo json_encode($respuesta);
