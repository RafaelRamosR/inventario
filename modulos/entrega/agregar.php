<?php
require_once("conexion.php");
$resultado = [];
$error = "";

if (
    isset($_POST['id_producto']) == false
    || $_POST['id_producto'] == ""
) {
    $error .= "Producto es obligatorio.\n";
}

if (
    isset($_POST['fecha_adquisicion']) == false
    || $_POST['fecha_adquisicion'] == ""
) {
    $error .= "Fecha de adquisicion es obligatoria.\n";
}

if (
    isset($_POST['fecha_entrega']) == false
    || $_POST['fecha_entrega'] == ""
) {
    $error .= "Fecha de entrega es obligatoria.\n";
}

if (
    isset($_POST['referencia']) == false
    || $_POST['referencia'] == ""
) {
    $error .= "Referencia es obligatoria.\n";
}

if (
    isset($_POST['responsable']) == false
    || $_POST['responsable'] == ""
) {
    $error .= "Responsable es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[ a-z|A-Z]*$/']];
    if (filter_var($_POST['responsable'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Responsable solo debe tener letras.\n";
    }
}

if (
    isset($_POST['cantidad']) == false
    || $_POST['cantidad'] == ""
) {
    $error .= "La cantidad es obligatoria.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[0-9]*$/']];
    if (filter_var($_POST['cantidad'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "La cantidad solo debe tener números.\n";
    }
}

 if ($error != "") {
     $resultado['error'] = true;
     $resultado['msg'] = $error;
     echo json_encode($resultado);
     exit(0);
 }

$id_producto = $_POST['id_producto'];
$fecha_adquisicion = $_POST['fecha_adquisicion'];
$fecha_entrega = $_POST['fecha_entrega'];
$referencia = $_POST['referencia'];
$responsable = $_POST['responsable'];
$cantidad = $_POST['cantidad'];

$sql="INSERT INTO entrega (
							id_producto,
                fecha_adquisicion, 
                fecha_entrega,
                referencia, 
                responsable,
                cantidad)
							VALUES(

                                '$id_producto', 
                    '$fecha_adquisicion',
                    '$fecha_entrega', 
                    '$referencia', 
                    '$responsable',
                    '$cantidad'
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
