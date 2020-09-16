<?php
require_once("conexion.php");

$resultado = [];
$error = "";

if (
    isset($_POST['tipo_identidad']) == false
    || $_POST['tipo_identidad'] == ""
) {
    $error .= "Tipo identidad es obligatoria.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[ a-z|A-Z]*$/']];
    if (filter_var($_POST['tipo_identidad'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Tipo identidad solo debe tener letras.\n";
    }
}

 if ($error != "") {
     $resultado['error'] = true;
     $resultado['msg'] = $error;
     echo json_encode($resultado);
     exit(0);
 }

$nombre = $_POST['tipo_identidad'];

$sql="INSERT INTO tipo_identidad (
						
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
