<?php
require_once("conexion.php");
$resultado = [];
$error = "";

//VALIDAR PRIMER NOMBRE//
if (
    isset($_POST['nombre']) == false
    || $_POST['nombre'] == ""
) {
    $error .= "Nombre es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[a-z|A-Z]*$/']];
    if (filter_var($_POST['nombre'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Nombre solo debe tener letras.\n";
    }
}


//VALIDAR CORREO PRINCIPAL//
if (
    isset($_POST['correo']) == false
    || $_POST['correo'] == ""
) {
    $error .= "El correo es obligatorio.\n";
} else {
    if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL) === true) {
        $error .= "El correo debe ser un correo valido.\n";
    }
}

//VALIDAR DIRECCIÓN//
if (
    isset($_POST['dir']) == false
    || $_POST['dir'] == ""
) {
    $error .= "Dirección es obligatoria.\n";
}

//VALIDAR TELEFONO//
if (
    isset($_POST['telefono']) == false
    || $_POST['telefono'] == ""
) {
    $error .= "El teléfono es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[0-9]*$/']];
  if (filter_var($_POST['telefono'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Teléfono solo debe tener números.\n";
  }
}

 if ($error != "") {
     $resultado['error'] = true;
     $resultado['msg'] = $error;
     echo json_encode($resultado);
     exit(0);
 }

$id = $_POST['id_proveedor'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$dir = $_POST['dir'];
$correo = $_POST['correo'];




$sql = "UPDATE proveedor SET
            nombre='$nombre',
            telefono='$telefono',
            dir='$dir',
            correo='$correo'

        WHERE 
          id_proveedor='$id'
    ";

mysqli_query($conexion, $sql);

if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["msg"] = "Datos modificados con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["msg"] = mysqli_error($conexion);
}
echo json_encode($resultado);
?>