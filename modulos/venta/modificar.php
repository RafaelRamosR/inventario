<?php
require_once("conexion.php");

$id = $_POST['id_producto'];
$nombre_producto = $_POST['nombre_producto'];
$tipo_producto = $_POST['tipo_producto'];
$modelo_producto = $_POST['modelo_producto'];
$stock = $_POST['stock'];
$fecha_adquisicion = $_POST['fecha_adquisicion'];
$proveedores = $_POST['proveedores'];
$referencia = $_POST['referencia'];



$sql = "UPDATE producto SET 

nombre = '$nombre_producto',
            id_tipo_producto='$tipo_producto',
            modelo='$modelo_producto',
            stock='$stock',
            fecha_adquisicion='$fecha_adquisicion',
            id_provedore='$proveedores',
            referencia='$referencia'

             
             WHERE  
             id_producto='$id_persona'    
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