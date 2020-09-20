<?php
require_once("conexion.php");
$id_cargo = $_GET['id'];
$sql = "SELECT 
                id_cargo,
                nombre
        FROM cargo 
        WHERE id_cargo='$id_cargo'";

$rs = mysqli_query($conexion, $sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);
