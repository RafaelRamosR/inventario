<?php
  if ($mod_permitir_acceso == true) {
    if ($mod_contenido == "") {
        require_once($mod_ruta_archivo);
    } else {
        $sql = "SELECT contenido FROM contenido WHERE modulo='mod_contenido'";
        $rs = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($rs);
        echo $row['contenido'];
    }
} else {
    echo "<div class='acceso-denegado'>Acesso denegado!</div>";
}