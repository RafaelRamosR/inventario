<?php
require_once("conexion.php");
$id_zona_de_residencia = $_GET['id_zona_de_residencia'];
$sql = "SELECT 
               id_zona_de_residencia,
               nombre
                
        FROM zona_de_residencia 
        WHERE id_zona_de_residencia='$id_zona_de_residencia'";

$rs = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($rs);

echo json_encode($row);