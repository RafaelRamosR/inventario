<?php
require_once("conexion.php");
$id_contenido = $_GET['id_contenido'];
$sql = "SELECT  id_contenido,
                titulo,
                modulo,
                contenido
        FROM contenido 
        WHERE id_contenido='$id_contenido'";

$rs = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);