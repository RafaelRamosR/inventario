<?php
require_once("conexion.php");
$resultado = [];

$error = "";
if (
    isset($_POST['id_rol']) == false
    || $_POST['id_rol'] == ""
) {
    $error .= "Es obligatorio seleccionar un rol.\n";
}

if (
    isset($_POST['modulo']) == false
    || $_POST['modulo'] == ""
) {
    $error .= "Es obligatorio seleccionar un módulo.\n";
}


if (
    isset($_POST['accion']) == false
    || $_POST['accion'] == ""
) {
    $error .= "Es obligatorio seleccionar una acción\n";
} 

if ($error != "") {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error;
    echo json_encode($resultado);
    exit(0);
}

$id_rol = $_POST['id_rol'];
$modulo = $_POST['modulo'];
$accion = $_POST['accion'];


$sql = "INSERT INTO permiso_rol (
                id_rol, 
                modulo, 
                accion 
             ) VALUES (
                    '$id_rol', 
                    '$modulo', 
                    '$accion' 
                    
                )";
mysqli_query($conexion, $sql);

//$resultado = array();


if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["mensaje"] = "Datos agregados con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["mensaje"] = mysqli_error($conexion);
}
// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);
