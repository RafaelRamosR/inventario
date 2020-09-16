<?php
require_once("conexion.php");
$id_persona = $_GET['id_persona'];
$sql = "SELECT 
                id_persona,
                id_tipo_de_identificacion,
                id_sexo, 
                id_municipio_expedicion,
                id_municipio_de_nacimiento, 
                id_estado_civil,
                id_municipio_de_residencia,
                id_zona_residencia,
                Num_Identificacion,
                fecha_expedicion,
                primer_nombre,
                segundo_nombre,
                primer_apellido,
                segundo_apellido,
                fecha_nacimiento,
                direccion,
                correo_principal,
                correo_alternativo,
                telefono_principal, 
                telefono_alternativo,
                id_cargo
        FROM persona 
        WHERE id_persona='$id_persona'";

$rs = mysqli_query($conexion,$sql);

$row = mysqli_fetch_assoc($rs);

echo json_encode($row);