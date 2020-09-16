
<?php
require_once("conexion.php");
$resultado = [];
$error = "";

$id_persona = $_POST['id_persona'];

//VALIDAR CLAVE ACTUAL//
$clave = mysqli_query($conexion, "SELECT * FROM persona WHERE id_persona = $id_persona");
$matriz_clave = mysqli_fetch_assoc($clave);
$clave = $matriz_clave['clave'];

if (isset($_POST['password_actual']) == false || $_POST['password_actual'] == "") {
    $error .= "La contraseña actual es obligatoria.\n";
}elseif($_POST['password_actual'] != $clave){
    $error .= "La contraseña actual es incorrecta.\n";
}

//VALIDAR CLAVE NUEVA//
if (isset($_POST['nueva_password']) == false || $_POST['nueva_password'] == "") {
    $error .= "La contraseña es obligatoria.\n";
}

//VALIDAR CLAVE REPETIR//
if (isset($_POST['nueva_password2']) == false || $_POST['nueva_password2'] == "") {
    $error .= "Repetir la contraseña es obligatorio.\n";
}elseif($_POST['nueva_password2'] != $_POST['nueva_password']){
    $error .= "La contraseñas no coinciden.\n";
}

 if ($error != "") {
     $resultado['error'] = true;
     $resultado['mensaje'] = $error;
     echo json_encode($resultado);
     exit(0);
 }

$clave = $_POST['nueva_password'];


$sql = "UPDATE persona SET 
            clave = '$clave'
        WHERE
            id_persona='$id_persona' 
                 ";

mysqli_query($conexion, $sql);


if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["mensaje"] = "Cambio de contraseña exitosa.";
} else {
    $resultado["error"] = true;
    $resultado["mensaje"] = mysqli_error($conexion);
}
// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);