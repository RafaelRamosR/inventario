<?php
require_once("conexion.php");
$resultado = [];
$error = "";

if (
    isset($_POST['modulo']) == false
    || $_POST['modulo'] == ""
) {
    $error .= "El modulo es obligatorio.\n";
}

if (
    isset($_POST['accion']) == false
    || $_POST['accion'] == ""
) {
    $error .= "La acción es obligatoria.\n";
}


if ($error != "") {
    $resultado['error'] = true;
    $resultado['msg'] = $error;
    echo json_encode($resultado);
    exit(0);
}

$id_modulo_accion = $_POST['id_modulo_accion'];
$modulo = $_POST['modulo'];
$accion = $_POST['accion'];


$sql = "UPDATE modulo_accion SET 
      
        
            modulo = '$modulo', 
            accion = '$accion' 
        
        WHERE  
            id_modulo_accion='$id_modulo_accion'    
                 ";
mysqli_query($conexion, $sql);

//$resultado = array();
$resultado = [];

if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["msg"] = "Datos modificados con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["msg"] = mysqli_error($conexion);
}
// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);

