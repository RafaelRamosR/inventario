<?php
require_once("conexion.php");

$r =[];
$error = "";


//VALIDAR TIPO DE IDNTIFICACIÓN//
if (
    isset($_POST['tipo_de_identificacion']) == false
    || $_POST['tipo_de_identificacion'] == ""
) {
    $error .= "El tipo de identificación es obligatorio.\n";
}

//VALIDAR TIPO DE SEXO//
if (
    isset($_POST['sexo']) == false
    || $_POST['sexo'] == ""
) {
    $error .= "El tipo de sexo es obligatorio.\n";
}

//VALIDAR MUNICIPIO DE EXPEDICIÓN//
if (
    isset($_POST['municipio_expedicion']) == false
    || $_POST['municipio_expedicion'] == ""
) {
    $error .= "El municipio de expedicion es obligatorio.\n";
}

//VALIDAR MUNICIPIO DE NACIMIENTO//
if (
    isset($_POST['municipio_nacimiento']) == false
    || $_POST['municipio_nacimiento'] == ""
) {
    $error .= "El municipio de nacimiento es obligatorio.\n";
}

//VALIDAR TIPO DE ESTADO CIVIL//
if (
    isset($_POST['estado_civil']) == false
    || $_POST['estado_civil'] == ""
) {
    $error .= "El estado civil es obligatorio.\n";
}

//VALIDAR MUNICIPIO DE RESIDENCIA//
if (
    isset($_POST['municipio_residencia']) == false
    || $_POST['municipio_residencia'] == ""
) {
    $error .= "El municipio de residencia es obligatorio.\n";
}

//VALIDAR ZONA DE RESIDENCIA//
if (
    isset($_POST['zona_residencia']) == false
    || $_POST['zona_residencia'] == ""
) {
    $error .= "La zona de residencia es obligatoria.\n";
}

//VALIDAR NÚMERO DE IDNTIFICACIÓN//
if (
    isset($_POST['numero_identificacion']) == false
    || $_POST['numero_identificacion'] == ""
) {
    $error .= "El número de identificación es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[0-9]*$/']];
    if (filter_var($_POST['numero_identificacion'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "El número de identificación solo debe tener números.\n";
    }
}
//VALIDAR FECHA DE EXPEDICIÓN//
if (
    isset($_POST['fecha_expedicion']) == false
    || $_POST['fecha_expedicion'] == ""
) {
    $error .= "Fecha de expedicion es obligatoria.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^(\d{4})(\/|-)(0[1-9]|1[0-2])\2([0-2][0-9]|3[0-1])$/']];
    if (filter_var($_POST['fecha_expedicion'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "La fecha de expedicion no cumple los requisitos.\n";
    }
}

//VALIDAR PRIMER NOMBRE//
if (
    isset($_POST['primer_nombre']) == false
    || $_POST['primer_nombre'] == ""
) {
    $error .= "Primer nombre es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[a-z|A-Z]*$/']];
    if (filter_var($_POST['primer_nombre'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Primer nombre solo debe tener letras.\n";
    }
}
//VALIDAR SEGUNDO NOMBRE//
if (
    isset($_POST['segundo_nombre']) == true
    && $_POST['segundo_nombre'] !== ""
) {
    $opciones = ["options" => ["regexp" => '/^[a-z|A-Z]*$/']];
if (filter_var($_POST['segundo_nombre'], FILTER_VALIDATE_REGEXP, $opciones) === false
) {
        $error .= "Segundo nombre solo debe tener letras.\n";
  }
}
//VALIDAR PRIMER APELLIDO//
if (
    isset($_POST['primer_apellido']) == false
    || $_POST['primer_apellido'] == ""
) {
    $error .= "Primer apellido es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[a-z|A-Z]*$/']];
    if (filter_var($_POST['primer_apellido'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "Primer apellido solo debe tener letras.\n";
    }
}
//VALIDAR SEGUNDO APELLIDO//
if (
    isset($_POST['segundo_apellido']) == true
    && $_POST['segundo_apellido'] !== ""
) {
    $opciones = ["options" => ["regexp" => '/^[a-z|A-Z]*$/']];
if (filter_var($_POST['segundo_apellido'], FILTER_VALIDATE_REGEXP, $opciones) === false
) {
        $error .= "Segundo apellido solo debe tener letras.\n";
  }
}
//VALIDAR FECHA DE NACIMIENTO//
if (
    isset($_POST['fecha_nacimiento']) == false
    || $_POST['fecha_nacimiento'] == ""
) {
    $error .= "Fecha de nacimiento es obligatoria.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^(\d{4})(\/|-)(0[1-9]|1[0-2])\2([0-2][0-9]|3[0-1])$/']];
    if (filter_var($_POST['fecha_nacimiento'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "La fecha de nacimiento no cumple los requisitos.\n";
    }
}

//VALIDAR MUNICIPIO DE NACIMIENTO//
if (
    isset($_POST['direccion']) == false
    || $_POST['direccion'] == ""
) {
    $error .= "La dirección es obligatoria.\n";
}

//VALIDAR MUNICIPIO DE RESIDENCIA//
if (
    isset($_POST['correo_principal']) == false
    || $_POST['correo_principal'] == ""
) {
    $error .= "El correo principal es obligatorio.\n";
}
//VALIDAR TIPO DE ZONA DE RESIDENCIA//
if (
    isset($_POST['telefono_principal']) == false
    || $_POST['telefono_principal'] == ""
) {
    $error .= "El telefono principal es obligatorio.\n";
} else {
    $opciones = ["options" => ["regexp" => '/^[0-9]*$/']];
    if (filter_var($_POST['telefono_principal'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "El telefono solo debe tener números.\n";
    }
}

$nombre = $_POST['tipo_identidad'];

$sql="INSERT INTO tipo_identidad (
						
                nombre)
							VALUES(

                     
                    '$nombre'
						)";

mysqli_query($conexion, $sql);

if(mysqli_error($conexion)!="" ) {
	$r["error"]=true;
	$r["msg"] = mysqli_error($conexion);
 } else {

	$r["error"]=false;
	$r["msg"] = "Registro agregado con éxito.";
 }
echo json_encode($r);
?>
