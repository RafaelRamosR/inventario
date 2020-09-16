<?php
require_once("conexion.php");
$resultado = [];
$error = "";

//VALIDAR NOMBRE//
if (
    isset($_POST['nombre_producto']) == false
    || $_POST['nombre_producto'] == ""
) {
    $error .= "Nombre producto es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[a-z|A-Z]*$/']];
    if (filter_var($_POST['nombre_producto'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Nombre producto solo debe tener letras.\n";
    }
}

//VALIDAR FECHA DE ADQUISICION//
if (
    isset($_POST['fecha_adquisicion']) == false
    || $_POST['fecha_adquisicion'] == ""
) {
    $error .= "Fecha de adquisicion es obligatoria.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^(\d{4})(\/|-)(0[1-9]|1[0-2])\2([0-2][0-9]|3[0-1])$/']];
    if (filter_var($_POST['fecha_adquisicion'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "La fecha de adquisicion no cumple los requisitos.\n";
    }
}

//VALIDAR TIPO PRODUCTO//
if (
    isset($_POST['tipo_producto']) == false
    || $_POST['tipo_producto'] == ""
) {
    $error .= "Tipo producto es obligatorio.\n";
}

//VALIDAR MODELO PRODUCTO//
if (
    isset($_POST['modelo_producto']) == false
    || $_POST['modelo_producto'] == ""
) {
    $error .= "Modelo producto es obligatorio.\n";
}

//VALIDAR TELEFONOS//
if (
    isset($_POST['stock']) == false
    || $_POST['stock'] == ""
) {
    $error .= "El stock es obligatorio.\n";
}else {
    $opciones = ["options" => ["regexp" => '/^[0-9]*$/']];
    if (filter_var($_POST['stock'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "El stock solo debe tener números.\n";
    }
}

if (
    isset($_POST['proveedores']) == false
    || $_POST['proveedores'] == ""
) {
    $error .= "El proveedor es obligatorio.\n";
}

if (
    isset($_POST['referencia']) == false
    || $_POST['referencia'] == ""
) {
    $error .= "La referencia es obligatoria.\n";
}

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
        id_producto='$id'
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