<?php
require_once("conexion.php");
$id_tipo_producto= $_GET['id'];
$sql = "SELECT 
                id_tipo_producto,
                nombre
                
        FROM tipo_producto 
        WHERE id_tipo_producto='$id_tipo_producto'";

$rs = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);