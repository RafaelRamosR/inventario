<?php
require_once("conexion.php");
$resultado = [];
$error = "";

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

$id_contenido = $_POST['id_contenido'];
$titulo = $_POST['titulo2'];
//$modulo = $_POST['modulo'];
$contenido = $_POST['contenido'];

$sql = "UPDATE contenido SET 
            titulo = '$titulo', 
 
            contenido ='$contenido'
        WHERE  
            id_contenido='$id_contenido'    
                 ";
mysqli_query($conexion, $sql);

//$resultado = array();
$resultado = [];

if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["mensaje"] = "Datos modificados con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["mensaje"] = mysqli_error($conexion);
}
// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);