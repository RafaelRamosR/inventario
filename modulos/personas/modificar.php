<?php
require_once("conexion.php");

$persona_id = $_POST['persona_id'];
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


$sql = "UPDATE  persona SET
            tipo_identificacion_id='$tipo_identificacion_id', 
            identificacion='$identificacion', 
            nombre='$nombre', 
            apellido='$apellido', 
            fecha_nacimiento='$fecha_nacimiento', 
            municipio_id='$municipio_id', 
            telefono='$telefono'
        WHERE persona_id ='$persona_id'
                         ";

mysqli_query($conexion, $sql);
$respuesta = [];
if (mysqli_error($conexion) == "") {
    $respuesta['error'] = false;
    $respuesta['msg'] = "Registro modificado con éxito.";
} else {
    $respuesta['error'] = true;
    $respuesta['msg'] = mysqli_error($conexion);
}
echo json_encode($respuesta);
