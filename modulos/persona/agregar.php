<?php
require_once("php/validacion-config.php");

$resultado = [];
$error = "";

if (!validar_obligatorio($_POST['tipo_de_identificacion'])) {
  $error .= "El tipo de identificación es obligatorio.</br>";
}

if (!validar_obligatorio($_POST['sexo'])) {
  $error .= "El tipo de sexo es obligatorio.</br>";
}

if (!validar_obligatorio($_POST['municipio_expedicion'])) {
  $error .= "El municipio de expedicion es obligatorio.</br>";
}

if (!validar_obligatorio($_POST['municipio_nacimiento'])) {
  $error .= "El municipio de nacimiento es obligatorio.</br>";
}

if (!validar_obligatorio($_POST['estado_civil'])) {
  $error .= "El estado civil es obligatorio.</br>";
}

if (!validar_obligatorio($_POST['cargo'])) {
  $error .= "El cargo es obligatorio.</br>";
}

if (!validar_obligatorio($_POST['municipio_residencia'])) {
  $error .= "El municipio de residencia es obligatorio.</br>";
}

if (!validar_obligatorio($_POST['zona_residencia'])) {
  $error .= "La zona de residencia es obligatorio.</br>";
}

if (!validar_obligatorio($_POST['numero_identificacion'])) {
  $error .= "El numero identificación es obligatorio.</br>";
}

if (!validar_numero($_POST['numero_identificacion'], 7, 15, FALSE)) {
  $error .= "Numero identificación solo debe tener números, ser mayor a 7 digitos y menor a 15 digitos.</br>";
}

if (!validar_fecha($_POST['fecha_expedicion'])) {
  $error .= "La fecha de expedicion no cumple los requisitos.</br>";
}

if (!validar_obligatorio($_POST['primer_nombre'])) {
  $error .= "Primer nombre es obligatorio.</br>";
}

if (!validar_texto($_POST['primer_nombre'], 3, 20, FALSE)) {
  $error .= "Primer nombre solo debe tener letras y tener una longitud entre 3 y 20 letras.</br>";
}

if (!validar_texto($_POST['segundo_nombre'], 3, 20, FALSE)) {
  $error .= "Segundo nombre solo debe tener letras y tener una longitud entre 3 y 20 letras.</br>";
}

if (!validar_obligatorio($_POST['primer_apellido'])) {
  $error .= "Primer apellido es obligatorio.</br>";
}

if (!validar_texto($_POST['primer_apellido'], 3, 20, FALSE)) {
  $error .= "Primer apellido solo debe tener letras y tener una longitud entre 3 y 20 letras.</br>";
}

if (!validar_texto($_POST['segundo_apellido'], 3, 20, FALSE)) {
  $error .= "Segundo apellido solo debe tener letras y tener una longitud entre 3 y 20 letras.</br>";
}

if (validar_fecha($_POST['fecha_nacimiento'])) {
  $error .= "La fecha de nacimiento no cumple los requisitos.</br>";
}

if (validar_obligatorio($_POST['direccion'])) {
  $error .= "La dirección es obligatoria.</br>";
}

if (!validar_mail($_POST['correo_principal'], 10, 100, TRUE)) {
  $error .= "El correo principal debe ser un correo valido.</br>";
}

if (!validar_mail($_POST['correo_alternativo'], 10, 100, FALSE)) {
  $error .= "El correo alternativo debe ser un correo valido.</br>";
}

if (!validar_obligatorio($_POST['telefono_principal'])) {
  $error .= "El telefono principal es obligatorio.</br>";
}

if (!validar_numero($_POST['telefono_principal'], 7, 10, FALSE)) {
  $error .= "Teléfono principal solo debe tener números, ser mayor a 7 digitos y menor a 10 digitos.</br>";
}

if (!validar_numero($_POST['telefono_alternativo'], 7, 10, FALSE)) {
  $error .= "Teléfono alternativo solo debe tener números, ser mayor a 7 digitos y menor a 10 digitos.</br>";
}

if ($error != "") {
  $resultado['error'] = true;
  $resultado['msg'] = $error;
  echo json_encode($resultado);
  exit(0);
}

$tipo_identificacion = $_POST['tipo_de_identificacion'];
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

$sql = "INSERT INTO persona (
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
    id_cargo
        ) VALUES(
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
