<?php
require_once("conexion.php");
$resultado = [];
$error = "";

if (isset($_POST['id_producto']) == false || $_POST['id_producto'] == "") {
    $error .= "Codigo de producto es obligatorio.\n";
}

if (isset($_POST['fecha_ingreso']) == false || $_POST['fecha_ingreso'] == "") {
    $error .= "Fecha de ingreso es obligatoria.\n";
}

if ($error != "") {
    $resultado['error'] = true;
    $resultado['msg'] = $error;
    echo json_encode($resultado);
    exit(0);
}

$id_producto = $_POST['id_producto'];
$fecha_ingreso = $_POST['fecha_ingreso'];

$sql="INSERT INTO ingreso (
    id_producto,
    fecha_ingreso
    ) VALUES(
    '$id_producto', 
    '$fecha_ingreso'
)";

mysqli_query($conexion, $sql);

if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["msg"] = "Datos agregados con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["msg"] = mysqli_error($conexion);
}

// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);
