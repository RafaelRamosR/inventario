<?php
require_once("conexion.php");

$id = $_GET['id'];

$sql = "SELECT 
    id_contenido, modulo, titulo, contenido
    FROM contenido
    WHERE id_contenido='$id' 
";

$rs = mysqli_query($conexion, $sql);
$rw = mysqli_fetch_assoc($rs);
echo json_encode($rw);
