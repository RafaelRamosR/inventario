<?php
require_once("conexion.php");

$id = $_GET['id'];

$sql = "SELECT 
    persona_id,
    tipo_identificacion_id,
    identificacion,
    nombre,
    apellido,
    fecha_nacimiento,
    municipio_id,
    telefono
    FROM persona
    WHERE persona_id='$id'
";

$rs = mysqli_query($conexion, $sql);
$rw = mysqli_fetch_assoc($rs);
echo json_encode($rw);
