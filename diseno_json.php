
 <?php
if($mod_permitir_acceso==true) {
    require_once($mod_ruta_archivo);
} else {
    $resultado = [];
    $resultado['msg'] = "Acceso denegado !!!";
    $resultado['error'] = true;
    echo json_encode($resultado);
}
