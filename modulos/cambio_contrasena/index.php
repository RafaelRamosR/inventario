<?php 
    require_once("conexion.php");

    $sql = "SELECT 
                p.id_persona
            FROM
                persona p
            WHERE id_persona=$_SESSION[id_persona] ";
    
    $rs = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($rs);
    ?>



<?php
require_once("conexion.php");
?>
<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
     
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="js/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Cambiar Contraseña</title>
</head>

<body>
    <div class="container mt-4" style="max-width:700px">
        <div class="card">
            <div class="card-header">
                

         <div align="center"><h2>Cambiar mi Contraseña</h2></div>
 <br>
            <div class="card-body">
                <form id="formulario">
                    <input type="hidden" name="id_persona" id="id_persona" value="<?php echo $row['id_persona']; ?>">
                    <div class="form-group row">
                        <label for="password_actual" class="col-sm-3 col-form-label">Contraseña Actual</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="password_actual" name="password_actual" placeholder="Ingrese Contraseña Actual">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nueva_password" class="col-sm-3 col-form-label">Nueva Contraseña</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nueva_password" name="nueva_password" placeholder="Ingrese Nueva Contraseña">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nueva_password2" class="col-sm-3 col-form-label">Repetir Nueva Contraseña</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nueva_password2" name="nueva_password2" placeholder="Repetir Nueva Contraseña">
                        </div>
                    </div>          

                    
                    </div>
                    <hr />
                    <div class="form-group row mb-0">
                        <div class="col-sm-12 text-right">
                            <input type="button" class="btn btn-secondary" id="btn-aceptar" value="Guardar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $("#btn-aceptar").click(function() {
            if (confirm("¿Desea agregar el registro?")) {
                var parametros = $("#formulario").serialize();
                $.post("?modulo=contrasena&accion=modificar", parametros, function(respuesta) {
                    //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.mensaje);
                    if (r.error == false) {
                        window.location.replace("?modulo=contrasena&accion=ver");
                    }
                });
            }
        });
        </script>
</body>

</html>