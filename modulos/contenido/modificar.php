<?php
require_once("conexion.php");

$contenido_id = $_POST['contenido_id'];
$modulo = $_POST['modulo'];
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];


$errores = "";
$respuesta = [];

// Poner validaciones

if ($errores != "") {
    $respuesta['error'] = true;
    $respuesta['msg'] = $errores;
    echo json_encode($respuesta);
    exit(0);
}


$sql = "UPDATE  contenido SET
            modulo='$modulo', 
            titulo='$titulo', 
            contenido='$contenido' 
        WHERE contenido_id ='$contenido_id'
                         ";

mysqli_query($conexion, $sql);
$respuesta = [];
if (mysqli_error($conexion) == "") {
    $respuesta['error'] = false;
    $respuesta['msg'] = "Registro modificado con éxito.";
} else {
    $respuesta['error'] = true;
    $respuesta['msg'] = mysqli_error($conexion);
}
echo json_encode($respuesta);
