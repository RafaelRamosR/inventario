<?php
require_once("conexion.php");
$id_entrega = $_GET['id_entrega'];
$sql = "SELECT 
                id_entrega,
                id_producto,
                fecha_adquisicion, 
                fecha_entrega,
                referencia, 
                responsable,
                cantidad
        FROM entrega 
        WHERE id_entrega='$id_entrega'";

$rs = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);