<?php
require_once("conexion.php");
$id_proveedor = $_GET['id_proveedor'];
$sql = "SELECT 
                id_proveedor,
                nombre,
                telefono,
                dir,
                correo
        FROM proveedor 
        WHERE id_proveedor='$id_proveedor'";

$rs = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);