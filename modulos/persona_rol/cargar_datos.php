<?php



require_once("conexion.php");
$id_persona_rol = $_GET['id_persona_rol'];
$sql = "SELECT  id_persona_rol,
               	id_persona, 
                id_rol 
                
        FROM persona_rol 
        WHERE id_persona_rol='$id_persona_rol'";

$rs = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);