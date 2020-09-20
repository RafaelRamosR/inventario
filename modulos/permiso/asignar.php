<?php
require_once("conexion.php");
$id_permiso = $_GET['id'];
$sql = "SELECT 
               id_permiso,
               nombre,
               descripcion
                
        FROM permiso 
        WHERE id_permiso='$id_permiso'";

$rs = mysqli_query($conexion, $sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);
