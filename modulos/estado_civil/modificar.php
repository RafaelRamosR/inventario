<?php
require_once("conexion.php");
$resultado = [];
$error = "";

if (
    isset($_POST['estado_civil']) == false
    || $_POST['estado_civil'] == ""
) {
    $error .= "Estado civil es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[)( a-z|A-Z]*$/']];
    if (filter_var($_POST['estado_civil'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Estado civil solo debe tener letras.\n";
    }
}

 if ($error != "") {
     $resultado['error'] = true;
     $resultado['msg'] = $error;
     echo json_encode($resultado);
     exit(0);
 }

$id = $_POST['id_estado_civil'];
$nombre = $_POST['estado_civil'];

$sql = "UPDATE estado_civil SET
            nombre = '$nombre'

        WHERE 
            id_estado_civil='$id'
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