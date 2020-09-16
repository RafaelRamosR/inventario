<?php
require_once("conexion.php");
$resultado = [];
$error = "";

if (
    isset($_POST['cargo']) == false
    || $_POST['cargo'] == ""
) {
    $error .= "Cargo es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[ a-z|A-Z]*$/']];
    if (filter_var($_POST['cargo'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Cargo solo debe tener letras.\n";
    }
}

 if ($error != "") {
     $resultado['error'] = true;
     $resultado['msg'] = $error;
     echo json_encode($resultado);
     exit(0);
 }

$id = $_POST['id_cargo'];
$nombre = $_POST['cargo'];



$sql = "UPDATE cargo SET
            nombre = '$nombre'

        WHERE 
        id_cargo='$id'
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