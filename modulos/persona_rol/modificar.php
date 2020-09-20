<?php
require_once("conexion.php");
$resultado = [];

$error = "";
if (
    isset($_POST['id_rol']) == false
    || $_POST['id_rol'] == ""
) {
    $error .= "Es obligatorio el rol.\n";
}

if (
    isset($_POST['id_persona']) == false
    || $_POST['id_persona'] == ""
) {
    $error .= "Es obligatorio la persona.\n";
}


if ($error != "") {
    $resultado['error'] = true;
    $resultado['msg'] = $error;
    echo json_encode($resultado);
    exit(0);
}

$id_persona_rol = $_POST['id_persona_rol'];
$id_persona = $_POST['id_persona'];
$id_rol = $_POST['id_rol'];


$sql = "UPDATE persona_rol SET 
      
        
            id_persona = '$id_persona', 
            id_rol = '$id_rol' 
        
        WHERE  
            id_persona_rol='$id_persona_rol'    
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
