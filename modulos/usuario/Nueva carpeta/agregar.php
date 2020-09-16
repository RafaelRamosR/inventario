<?php
require_once("conexion.php");
require_once("funciones.php");
$resultado = [];
$error = "";

if (
    isset($_POST['id_rol']) == false || $_POST['id_rol'] == ""
) {
    $error .= "Esta Opcion es Totalmente Necesario Para continuar.\n";
}

// if (
//     isset($_POST['identificacion']) == false
//     || $_POST['identificacion'] == ""
// ) {
//     $error .= "La identificación es obligatorio.\n";
// } else {
//     $opciones = ["options" => ["regexp" => '/^[0-9]*$/']];
//     if (filter_var($_POST['identificacion'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
//         $error .= "La identificación solo debe tener número.\n";
//     }
// }



// if (
//     isset($_POST['municipioexp_id']) == false
//     || $_POST['municipioexp_id'] == ""
// ) {
//     $error .= "El lugar de expedicion es Necesario.\n";
// } 

// if (
//     isset($_POST['name_user']) == false
//     || $_POST['name_user'] == ""
// ) {
//     $error .= "Su Nombre es Obligatorio.\n";
// } else {
//     $opciones = ["options" => ["regexp" => '/^[a-z|A-Z]*$/']];
//     if (filter_var($_POST['name_user'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
//         $error .= "EL Nombre solo debe tener letras.\n";
//     }
// }


//     $opciones = ["options" => ["regexp" => '/^[a-z|A-Z]*$/']];
//     if (filter_var($_POST['nombre2'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
//         $error .= "El segundo Nombre solo debe tener letras.\n";
//     }






// if (
//     isset($_POST['last_name_user']) == false
//     || $_POST['last_name_user'] == ""
// ) {
//     $error .= "Debe ingresar al menos un Apellido es Obligatorio.\n";
// } else {
//     $opciones = ["options" => ["regexp" => '/^[a-z|A-Z]*$/']];
//     if (filter_var($_POST['last_name_user'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
//         $error .= "El Apellido solo debe tener letras.\n";
//     }
// }



//     $opciones = ["options" => ["regexp" => '/^[a-z|A-Z]*$/']];
//     if (filter_var($_POST['apellido2'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
//         $error .= "Su segundo apellido solo debe tener letras.\n";
//     }



// if (
//     isset($_POST['fecha_nacimiento']) == false
//     || $_POST['fecha_nacimiento'] == ""
// ) {
//     $error .= "Su fecha de nacimiento es Obligatorio.\n";
// } else {
//     $opciones = ["options" => ["regexp" => '/^(\d{4})(\/|-)(0[1-9]|1[0-2])\2([0-2][0-9]|3[0-1])$/']];
//     if (filter_var($_POST['fecha_nacimiento'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
//         $error .= "La fecha de nacimiento no cumple los requisitos.\n";
//     }
   
// }



// if (
//     isset($_POST['sexo_id']) == false
//     || $_POST['sexo_id'] == ""
// ) {
//     $error .= " Ingrese su Sexo es Obligatorio.\n";
// } 


// if (
//     isset($_POST['municipio_id']) == false
//     || $_POST['municipio_id'] == ""
// ) {
//     $error .= " Su lugar de Nacimiento es Obligatorio.\n";
// } 


// if (
//     isset($_POST['estado_civil_id']) == false
//     || $_POST['estado_civil_id'] == ""
// ) {
//     $error .= "Su estado civil  es Obligatorio.\n";
// } 


// if (
//     isset($_POST['municipiores_id']) == false
//     || $_POST['municipiores_id'] == ""
// ) {
//     $error .= " Su lugar de residencia es obligatorio.\n";
// } 



// if (
//     isset($_POST['poblacion_id']) == false
//     || $_POST['poblacion_id'] == ""
// ) {
//     $error .= " Es obligatorio.\n";
// } 



// if (
//     isset($_POST['direccion']) == false
//     || $_POST['direccion'] == ""
// ) {
//     $error .= " Su Dirrecion de Residencia es Obligario.\n";
// } 


// if (
//     isset($_POST['phone_user']) == false
//     || $_POST['phone_user'] == ""
// ) {
//     $error .= " Un phone_user Es Necesario Para continuar.\n";
// } else {
//     $opciones = ["options" => ["regexp" => '/^[0-9]*$/']];
//     if (filter_var($_POST['phone_user'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
//         $error .= "La identificación solo debe tener número.\n";
//     }
// }



// if (
//     isset($_POST['mail_user']) == false
//     || $_POST['mail_user'] == ""
// ) {
//     $error .= " Un mail_user Es Necesario Para Continuar.\n";
// } else {
//     $opciones = ["options" => ["regexp" => '/^(([^<>()\[\]\\.,:\s@"]+(\.[^<>()\[\]\\.,:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/']];
//     if (filter_var($_POST['mail_user'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
//         $error .= "El mail_user principal no cumple con los requisitos.\n";
//     }
// }


// if ( isset($_POST['phone_user']) == false|| $_POST['phone_user'] == "") {
//     $error .= "Debe Ingresar Una Contraseña.\n";
// } else {
//       $opciones = ["options" => ["regexp" => '/^[0-9]*$/']];
//     if (filter_var($_POST['identificacion'], FILTER_VALIDATE_REGEXP, $opciones) === false) {
//         $error .= "La identificación solo debe tener número.\n";
//     }


//    if(isset($_POST['phone_user'])){
    
// if(strlen($_POST['phone_user'])<8){
//     $error.= "La contraseña es demasiado corta. Por favor, introduzca al menos 8 caracteres.\n";
//     }   

    
// }


// }



if ($error != "") {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error;
    echo json_encode($resultado);
    exit(0);
}





$id_rol = $_POST['id_rol'];

$name_user = $_POST['name_user'];

$last_name_user = $_POST['last_name_user'];


$direccion = $_POST['direccion'];
$mail_user = $_POST['mail_user'];

$phone_user = $_POST['phone_user'];
$pw_user = $_POST['pw_user'];





$sql = "INSERT INTO user (              
            
    
                id_rol,
        
        
                name_user,
        
                last_name_user,
    
         
          
                direccion,
                mail_user,
     
                phone_user,
                pw_user
               ) VALUES (                 
            
                '$id_rol',
         
          
            
                '$name_user',
           
                '$last_name_user',
       
      
         
       
           
                '$direccion',
                '$mail_user',
          
           
                '$phone_user',
                '$pw_user'
                    
                )";
mysqli_query($conexion, $sql);
echo mysqli_error($conexion);

//$resultado = array();


if (mysqli_error($conexion) == "") {
    $resultado["error"] = false;
    $resultado["mensaje"] = "Datos agregados del Usario con éxito.";
} else {
    $resultado["error"] = true;
    $resultado["mensaje"] = mysqli_error($conexion);
}
// json_encode convierte el arreglo en formato JSON
echo json_encode($resultado);
