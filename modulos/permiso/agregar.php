<?php
require_once("conexion.php");

$resultado = [];
$error = "";

if (
    isset($_POST['descripcion']) == false
    || $_POST['descripcion'] == ""
) {
    $error .= "Descripcion es obligatoria.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[ a-z|A-Z]*$/']];
    if (filter_var($_POST['descripcion'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Descripcion solo debe tener letras.\n";
    }
}

if (
    isset($_POST['nombre']) == false
    || $_POST['nombre'] == ""
) {
    $error .= "Nombre es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[ a-z|A-Z]*$/']];
    if (filter_var($_POST['nombre'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Nombre solo debe tener letras.\n";
    }
}

 if ($error != "") {
     $resultado['error'] = true;
     $resultado['msg'] = $error;
     echo json_encode($resultado);
     exit(0);
 }

$descripcion = $_POST['descripcion'];
$nombre = $_POST['nombre'];
        

$sql="INSERT INTO permiso (
							
                
                nombre,
                descripcion
                )
							VALUES(
                   
                    
                    '$nombre',
                    '$descripcion' 
                    
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
