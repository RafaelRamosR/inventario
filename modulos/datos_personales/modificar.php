<?php
require_once("conexion.php");
$resultado = [];
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

if (
    isset($_POST['cargo']) == false
    || $_POST['cargo'] == ""
) {
    $error .= "El cargo es obligatorio.\n";
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

//VALIDAR CORREOS//
if (
    isset($_POST['correo_principal']) == false
    || $_POST['correo_principal'] == ""
) {
    $error .= "El correo principal es obligatorio.\n";
}else {
    if (!filter_var($_POST['correo_principal'], FILTER_VALIDATE_EMAIL) === true) {
        $error .= "El correo principal debe ser un correo valido.\n";
    }
}

if ($_POST['correo_alternativo'] != "" && !filter_var($_POST['correo_alternativo'], FILTER_VALIDATE_EMAIL) === true) {
        $error .= "El correo alternativo debe ser un correo valido.\n";
    }

//VALIDAR TELEFONOS//
if (
    isset($_POST['telefono_principal']) == false
    || $_POST['telefono_principal'] == ""
) {
    $error .= "El telefono es obligatorio.\n";
}else {
    $opciones = ["options" => ["regexp" => '/^[0-9]*$/']];
    if (filter_var($_POST['telefono_principal'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "El telefono solo debe tener números.\n";
    }
}

if (
    isset($_POST['telefono_lternativo']) == true
    && $_POST['telefono_lternativo'] == ""
) {
    $error .= "El telefono alternativo es obligatorio.\n";
}else {
    $opciones = ["options" => ["regexp" => '/^[0-9]*$/']];
    if ($_POST['telefono_alternativo'] != "" && filter_var($_POST['telefono_alternativo'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
        $error .= "El telefono alternativo solo debe tener números.\n";
    }
}


 if ($error != "") {
     $resultado['error'] = true;
     $resultado['msg'] = $error;
     echo json_encode($resultado);
     exit(0);
 }

$id = $_POST['id_persona'];
$tipo_identificacion = $_POST['tipo_de_identificacion'];
$sexo = $_POST['sexo'];
$municipio_expedicion = $_POST['municipio_expedicion'];
$municipio_nacimiento = $_POST['municipio_nacimiento'];
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



$sql = "UPDATE persona SET
            id_tipo_de_identificacion = '$tipo_identificacion',
            id_sexo='$sexo',
            id_municipio_expedicion='$municipio_expedicion',
            id_municipio_de_nacimiento='$municipio_nacimiento',
            id_estado_civil='$estado_civil',
            id_municipio_de_residencia='$municipio_de_residencia',
            id_zona_residencia='$zona_de_residencia',
            Num_Identificacion='$numero_identificacion',
            fecha_expedicion='$fecha_expedicion',
            primer_nombre='$primer_nombre',
            segundo_nombre='$segundo_nombre',
            primer_apellido='$primer_apellido',
            segundo_apellido='$segundo_apellido',
            fecha_nacimiento='$fecha_nacimiento',
            direccion='$direccion',
            correo_principal='$correo_principal',
            correo_alternativo='$correo_alternativo',
            telefono_principal='$telefono_principal',
            telefono_alternativo='$telefono_alternativo',
            id_cargo='$cargo'

        WHERE 
            id_persona='$id'
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