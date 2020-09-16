<?php
require_once("conexion.php");

$resultado = [];
$error = "";

if (
    isset($_POST['nombre']) == false
    || $_POST['nombre'] == ""
) {
    $error .= "Departamento es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[ a-z|A-Z]*$/']];
    if (filter_var($_POST['nombre'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Departamento solo debe tener letras.\n";
    }
}

 if ($error != "") {
     $resultado['error'] = true;
     $resultado['msg'] = $error;
     echo json_encode($resultado);
     exit(0);
 }

$id = $_POST['id'];
$nombre = $_POST['nombre'];

$sql = "UPDATE departamento SET
            nombre='$nombre'
        WHERE 
        id='$id'
    ";

mysqli_query($conexion, $sql);

if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["msg"] = "Datos modificados con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["msg"] = mysqli_error($conexion);
}

// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);
?>