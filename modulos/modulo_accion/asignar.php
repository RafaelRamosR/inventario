<?php
$id_modulo_accion = $_GET['id'];
$sql = "SELECT  
        id_modulo_accion,
        modulo, 
        accion 
        FROM modulo_accion 
        WHERE id_modulo_accion='$id_modulo_accion'
";

$rs = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($rs);
echo json_encode($row);
