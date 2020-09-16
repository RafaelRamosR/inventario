
<?php
require_once("conexion.php");
require_once("header.php");

?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <link rel="stylesheet" href="css/bootstrapp.min.css" />   
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="webfonts/fontawesome-5.10.2/css/all.css" />
    <script src="js/jquery-3.4.1.min.js"></script>
    

   <link rel="stylesheet"href="css/animate.css"type="text/css" >
    <link rel="stylesheet"href="css/estilos.css"type="text/css" >
    <link rel="stylesheet"href="css/estyle.css"type="text/css" >
      <link rel="stylesheet" href="css/material-design-iconic-font.min.css">

    <link rel="stylesheet"href="css/responsive.css"type="text/css" >
    <title>INVENTARIO</title>
</head>

<body id="body">
   
        <div class="row" style="border:1px solid silver; padding: 5px;">
            <ul class="nav">
                <li class="nav-item">
                     <?php
                require_once("menu.php");
                ?>
                 </li>
            </ul>
        </div>


    <div class="container">

        <div class="row">

            <div class="col-md-12" >
               <?php 
               if ($mod_permitir_acceso == true) {
               if ($mod_contenido == "") {
                    require_once($mod_ruta_archivo);
                } else {
                    $sql = "SELECT contenido FROM contenido WHERE modulo='$mod_contenido'";
                    $rs = mysqli_query($conexion, $sql);
                    $row = mysqli_fetch_assoc($rs);
                    echo $row['contenido'];          
                }
            }else{
                ?>
    <div class="alert alert-danger mt-2" role="alert">
        Acceso denegado !!
    </div>
<?php
            }
                ?>
            
            </div>
        </div>
    </div>
        
<?php
include("pie.php");
?>

</body>
    <script src="js/all.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>