<?php
session_start();

require_once("configuracion.php");
require_once("conexion.php");

if (isset($_GET['modulo'])) {
    $modulo = $_GET['modulo'];
} else {
    $modulo = "inicio";
}

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = "ver";
}

if (isset($modulos[$modulo]) == false) {
    echo "El modulo no existe.";
    exit();
}

if (isset($modulos[$modulo]["acciones"][$accion]) == false) {
    echo "La acción no existe.";
    exit();
}

$mod_ruta = $modulos[$modulo]["ruta"];
$mod_diseno = $modulos[$modulo]["acciones"][$accion]["diseño"];
$mod_archivo = $modulos[$modulo]["acciones"][$accion]["archivo"];
$mod_ruta_archivo = $mod_ruta . $mod_archivo;


if(isset($modulos[$modulo]["acciones"][$accion]["contenido"])) {
    $mod_contenido = $modulos[$modulo]["acciones"][$accion]["contenido"];
} else {
    $mod_contenido = "";
}



 if (isset($modulos[$modulo]["verificar_permisos"]) == true) {
    if(isset($_SESSION['usuario'])==true) {
        $usuario = $_SESSION['usuario'];
    
    } else {
        $usuario="";
        
    }

    $sql = "SELECT 
                COUNT(*) cantidad
            FROM
                persona join persona_rol on persona_rol.id_persona = persona.id_persona
                JOIN
                rol ON persona_rol.id_rol = rol.id_rol
                 JOIN
                permiso_rol ON rol.id_rol = permiso_rol.id_rol
            WHERE
                persona.num_Identificacion = '$usuario'
                    AND permiso_rol.modulo = '$modulo'
                    AND permiso_rol.accion = '$accion'";

    $rs = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($rs);

    if($row['cantidad']==0){
        $mod_permitir_acceso = false;
    }  else {
        $mod_permitir_acceso = true;
    }


}
else {
    $mod_permitir_acceso = true;
} 


// switch ($mod_diseno) {
//     case "vertical":
//         require_once("diseno_vertical.php");
//         break;

//     case "horizontal":
//         require_once("diseno_horizontal.php");
//         break;

//     case "html":
//         require_once("diseno_html.php");
//         break;

//     case "json":
//         require_once("diseno_json.php");
//         break;

//     default:
//         break;
// }


if ($mod_diseno == "vertical") {
    require_once("diseno_vertical.php");
} else if ($mod_diseno == "horizontal") {
    require_once("diseno_horizontal.php");
} else if ($mod_diseno == "html") {
    require_once("diseno_html.php");
} else if ($mod_diseno == "json") {
    require_once("diseno_json.php");
} else {
    echo "Error de diseño";
}
