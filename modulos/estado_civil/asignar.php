<?php
require_once("conexion.php");
$id_estado_civil = $_GET['id'];
$sql = "SELECT 
                id_estado_civil,
                nombre
                
        FROM estado_civil 
        WHERE id_estado_civil='$id_estado_civil'";

$rs = mysqli_query($conexion, $sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);
