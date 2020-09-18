<?php
require_once("conexion.php");
$id_producto = $_GET['id'];
$sql = "SELECT 
                id_producto,
                nombre,
                id_tipo_producto, 
                modelo,
                stock, 
                fecha_adquisicion,
                id_provedore,
                referencia       
        FROM producto 
        WHERE id_producto='$id_producto'";

$rs = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);