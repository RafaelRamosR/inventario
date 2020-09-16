<?php
require_once("conexion.php");




$id = $_POST['id_tipo_identidad'];
$nombre = $_POST['tipo_identidad'];



$sql = "UPDATE tipo_identidad SET
             
            nombre='$nombre'
        WHERE 
        id_tipo_identidad='$id'
    ";

mysqli_query($conexion, $sql);



$r =[];
if(mysqli_error($conexion)!="" ) {
    $r["error"]=true;
    $r["msg"] = mysqli_error($conexion);
 } else {

    $r["error"]=false;
    $r["msg"] = "Registro modiificados con éxito.";
 }
echo json_encode($r);
?>