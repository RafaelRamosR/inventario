<?php
require_once("conexion.php");

$id_tipo_identificacion2 = $_POST['id_tipo_identificacion2'];
$sexo = $_POST['sexo'];
$municipio_expedicion = $_POST['municipio_expedicion'];
$municipio_de_nacimiento = $_POST['municipio_nacimiento'];
$estado_civil = $_POST['estado_civil'];
$municipio_de_residencia = $_POST['municipio_residencia'];
$zona_de_residencia = $_POST['zona_residencia'];
$numero_identificacion = $_POST['numero_identificacion'];
$fecha_expedicion = $_POST['fecha_expedicion'];
$primer_nombre = $_POST['primer_nombre'];
$segundo_nombre = $_POST['segundo_nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];
$correo_principal = $_POST['correo_principal'];
$correo_alternativo = $_POST['correo_alternativo'];
$telefono_principal = $_POST['telefono_principal'];
$telefono_alternativo = $_POST['telefono_alternativo'];
$cargo = $_POST['cargo'];

$errores = "";
$respuesta = [];

if($tid_tipo_identificacion2=="") {
    $errores .="<li>El campo 'Tipo identificación' es obligatorio</li>";
}

if($identificacion=="") {
    $errores .="<li>El campo 'Identificación' es obligatorio</li>";
}

if($nombre=="") {
    $errores .="<li>El campo 'Nombre' es obligatorio</li>";
}

if($apellido=="") {
    $errores .="<li>El campo 'Apellido' es obligatorio</li>";
}

if($fecha_nacimiento=="") {
    $errores .="<li>El campo 'fecha de nacimiento' es obligatorio</li>";
}

if($municipio_id=="") {
    $errores .="<li>El campo 'Municipio' es obligatorio</li>";
}

if($telefono=="") {
    $errores .="<li>El campo 'Telefono' es obligatorio</li>";
}


if ($errores != "") {
    $respuesta['error'] = true;
    $respuesta['msg'] = $errores;
    echo json_encode($respuesta);
    exit(0);
}

$sql="INSERT INTO persona (
							id_tipo_de_identificacion, 
                id_sexo, 
                id_municipio_expedicion,
                id_municipio_de_nacimiento, 
                id_estado_civil,
                id_municipio_de_residencia,
                id_zona_residencia,
                Num_Identificacion,
                fecha_expedicion,
                primer_nombre,
                segundo_nombre,
                primer_apellido,
                segundo_apellido,
                fecha_nacimiento,
                direccion,
                correo_principal,
                correo_alternativo,
                telefono_principal, 
                telefono_alternativo,
				id_cargo)
							VALUES(

                    '$tipo_identificacion', 
                    '$sexo', 
                    '$municipio_expedicion',
                    '$municipio_de_nacimiento', 
                    '$estado_civil', 
                    '$municipio_de_residencia',
                    '$zona_de_residencia',
                    '$numero_identificacion',
                    '$fecha_expedicion', 
                    '$primer_nombre',
                    '$segundo_nombre',
                    '$primer_apellido',
                    '$segundo_apellido',
                    '$fecha_nacimiento',
                    '$direccion', 
                    '$correo_principal',
                    '$correo_alternativo',
                    '$telefono_principal',
                    '$telefono_alternativo',
					'$cargo'
						)";

mysqli_query($conexion, $sql);

if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["msg"] = "Datos agregados con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["msg"] = mysqli_error($conexion);
}
echo json_encode($resultado);
?>
