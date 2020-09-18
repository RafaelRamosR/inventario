<?php
require_once("conexion.php");
$id_tipo_identidad = $_GET['id_tipo_identidad'];
$sql = "SELECT 
               id_tipo_identidad,
                nombre
        FROM tipo_identidad 
        WHERE id_tipo_identidad='$id_tipo_identidad'";

$rs = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);