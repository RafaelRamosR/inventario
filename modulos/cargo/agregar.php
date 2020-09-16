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

$nombre = $_POST['cargo'];

$sql="INSERT INTO cargo (
							nombre)
							VALUES(

                                '$nombre'
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
?>