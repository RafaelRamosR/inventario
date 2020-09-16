<?php
require_once("conexion.php");
$resultado = [];
$error = "";


//VALIDAR NOMBRE MODULO//
if (isset($_POST['modulo']) == false || $_POST['modulo'] == ""){
    $error .= "Nombre del módulo es obligatorio.\n";
}else{
    $opciones = ["options" => ["regexp" => '/[a-z|A-Z|ñáéíóú]*$/']];
    if (filter_var($_POST['modulo'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Nombre módulo no cumple los requisitos.\n";
    }
}

//VALIDAR NOMBRE TITULO//
if (isset($_POST['titulo2']) == false || $_POST['titulo2'] == ""){
    $error .= "Nombre del título es obligatorio.\n";
}else{
    $opciones = ["options" => ["regexp" => '/[a-z|A-Z|ñáéíóú]*$/']];
    if (filter_var($_POST['titulo2'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Nombre título no cumple los requisitos.\n";
    }
}


 if ($error != "") {
     $resultado['error'] = true;
     $resultado['mensaje'] = $error;
     echo json_encode($resultado);
     exit(0);
 }


$titulo = $_POST['titulo2'];
$modulo = $_POST['modulo'];
$contenido = $_POST['contenido'];

$sql = "INSERT INTO contenido (
                titulo, 
                modulo, 
                contenido) 
                VALUES (
                    '$titulo', 
                    '$modulo',
                    '$contenido')";
mysqli_query($conexion, $sql);

//$resultado = array();


if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["mensaje"] = "Datos agregados con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["mensaje"] = mysqli_error($conexion);
}
// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);
