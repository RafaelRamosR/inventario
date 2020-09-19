<?php
require_once("conexion.php");
$id = $_GET['id'];
$sql = "SELECT 
                id,
               departamento,
               nombre
        FROM municipio 
        WHERE id='$id'";

$rs = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);