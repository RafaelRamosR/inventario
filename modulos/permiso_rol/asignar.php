<?php
$id_permiso_rol = $_GET['id'];
$sql = "SELECT  
        id_permiso_rol,
        id_rol, 
        modulo, 
        accion 
        FROM permiso_rol 
        WHERE id_permiso_rol='$id_permiso_rol'
";

$rs = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($rs);
echo json_encode($row);
