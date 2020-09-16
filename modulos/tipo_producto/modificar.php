<?php
require_once("conexion.php");
$resultado = [];
$error = "";

if (
    isset($_POST['tipo_producto']) == false
    || $_POST['tipo_producto'] == ""
) {
    $error .= "Tipo producto es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[ a-z|A-Z]*$/']];
    if (filter_var($_POST['tipo_producto'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Tipo producto solo debe tener letras.\n";
    }
}

 if ($error != "") {
     $resultado['error'] = true;
     $resultado['msg'] = $error;
     echo json_encode($resultado);
     exit(0);
 }

$id = $_POST['id_tipo_producto'];
$nombre = $_POST['tipo_producto'];

$sql = "UPDATE tipo_producto SET
            nombre = '$nombre'

        WHERE 
            id_tipo_producto='$id'
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