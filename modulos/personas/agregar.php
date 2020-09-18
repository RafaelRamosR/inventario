<?php
require_once("conexion.php");


$tipo_identificacion_id = $_POST['tipo_identificacion_id'];
$identificacion = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$municipio_id = $_POST['municipio_id'];
$telefono = $_POST['telefono'];

$errores = "";
$respuesta = [];

if ($tipo_identificacion_id == "") {
    $errores .= "<li>El campo 'Tipo identificación' es obligatorio</li>";
}

if ($identificacion == "") {
    $errores .= "<li>El campo 'Identificación' es obligatorio</li>";
}

if ($nombre == "") {
    $errores .= "<li>El campo 'Nombre' es obligatorio</li>";
}

if ($apellido == "") {
    $errores .= "<li>El campo 'Apellido' es obligatorio</li>";
}

if ($fecha_nacimiento == "") {
    $errores .= "<li>El campo 'fecha de nacimiento' es obligatorio</li>";
}

if ($municipio_id == "") {
    $errores .= "<li>El campo 'Municipio' es obligatorio</li>";
}

if ($telefono == "") {
    $errores .= "<li>El campo 'Telefono' es obligatorio</li>";
}


if ($errores != "") {
    $respuesta['error'] = true;
    $respuesta['msg'] = $errores;
    echo json_encode($respuesta);
    exit(0);
}


$sql = "INSERT INTO persona (
    tipo_identificacion_id, 
    identificacion, 
    nombre, 
    apellido, 
    fecha_nacimiento, 
    municipio_id, 
    telefono
    ) VALUES (
    '$tipo_identificacion_id', 
    '$identificacion', 
    '$nombre', 
    '$apellido', 
    '$fecha_nacimiento', 
    '$municipio_id', 
    '$telefono'
)";

mysqli_query($conexion, $sql);
$respuesta = [];
if (mysqli_error($conexion) == "") {
    $respuesta['error'] = false;
    $respuesta['msg'] = "Registro guardado con éxito.";
} else {
    $respuesta['error'] = true;
    $respuesta['msg'] = mysqli_error($conexion);
}
echo json_encode($respuesta);
