<?php
require_once("conexion.php");
$id_user = $_GET['id_user'];

$sql = "SELECT  id_user,
				id_rol,
                name_user,
 
                last_name_user,
         
      
          
        
    
           
                direccion,
                mail_user,
         
                phone_user,
                pw_user
       
        FROM user
        WHERE id_user='$id_user'";


$rs = mysqli_query($conexion,$sql);
echo mysqli_error($conexion);

$row = mysqli_fetch_array($rs, MYSQLI_ASSOC);

echo json_encode($row);
