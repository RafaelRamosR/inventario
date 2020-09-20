<?php
$id_rol = $_GET['id'];
$sql = "SELECT  id_rol,
               	nombre 
              
                
        FROM rol 
        WHERE id_rol='$id_rol'";

$rs = mysqli_query($conexion,$sql);
$row = mysqli_fetch_assoc($rs);
echo json_encode($row);
