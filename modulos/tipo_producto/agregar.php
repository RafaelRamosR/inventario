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

$nombre = $_POST['tipo_producto'];

$sql="INSERT INTO tipo_producto(
							
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
