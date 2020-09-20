<?php
require_once("conexion.php");
$id_ingreso = $_GET['id'];
$sql = "SELECT
   e.id_ingreso,
   e.id_producto,
   e.fecha_ingreso
   FROM ingreso e
   WHERE id_ingreso='$id_ingreso'
";

$rs = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($rs);
echo json_encode($row);
