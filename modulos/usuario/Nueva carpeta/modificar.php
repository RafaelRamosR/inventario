<?php
require_once("conexion.php");

$usuario_id = $_POST['usuario_id'];

// $fecha_radicacion = $_POST['fecha_radicacion'];
// $tipo_tramite = $_POST['tipo_tramite'];
// $tipo_afiliacion_id = $_POST['tipo_afiliacion_id'];
// $tipo_usuario_id = $_POST['tipo_usuario_id'];
// $tipo_identificacion_id = $_POST['tipo_identificacion_id'];
// // $identificacion = $_POST['identificacion'];
$municipioexp_id = $_POST['municipioexp_id'];
$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo_id = $_POST['sexo_id'];
$municipio_id = $_POST['municipio_id'];
$estado_civil_id = $_POST['estado_civil_id'];
$municipiores_id = $_POST['municipiores_id'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$regimen_id = $_POST['regimen_id'];
$poblacion_id = $_POST['poblacion_id'];
$clave = $_POST['clave'];
$telefono = $_POST['telefono'];





$sql = "UPDATE usuario SET 
                municipioexp_id = '$municipioexp_id', 
                nombre1 = '$nombre1',
                nombre2 = '$nombre2',
                apellido1 = '$apellido1',
                apellido2 = '$apellido2',
                
                fecha_nacimiento = '$fecha_nacimiento',
                municipio_id = '$municipio_id',
                sexo_id =  '$sexo_id',
                municipiores_id = '$municipiores_id', 
                estado_civil_id = '$estado_civil_id',
                direccion = '$direccion',
                correo = '$correo',
                telefono = '$telefono',
                regimen_id = '$regimen_id',  
                poblacion_id = '$poblacion_id', 
                clave = '$clave'
              
        WHERE  
            usuario_id ='$usuario_id'";
mysqli_query($conexion, $sql);
echo mysqli_error($conexion);
//$resultado = array();
$resultado = [];

if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["mensaje"] = "Datos modificados del Usuario con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["mensaje"] = mysqli_error($conexion);
}
// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);