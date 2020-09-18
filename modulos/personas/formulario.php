<?php
require_once("conexion.php");
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <script src="lib/jquery/js/jquery-3.4.1.min.js"></script>
    <script src="lib/bootstrap/js/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap-notify.min.js"></script>

    <title>Ejercicio 1</title>
</head>

<body>


    <div class="container mt-4" style="max-width:700px">
        <div class="card">
            <div class="card-header">
                Agregar persona
            </div>

            <div class="card-body">
                <form id="formulario" method="post">
                    <div class="form-group row">
                        <label for="tipo_identificacion_id" class="col-sm-3 col-form-label">Tipo identificación</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="tipo_identificacion_id" name="tipo_identificacion_id">
                                <option value="">(Seleccionar tipo de identificación)</option>
                                <?php
                                $sql1 = "SELECT * FROM tipo_identificacion ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[tipo_identificacion_id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="identificacion" class="col-sm-3 col-form-label">Identificación</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Número de identificación">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido" class="col-sm-3 col-form-label">Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="fecha_nacimiento" class="col-sm-3 col-form-label">Fecha nacimiento</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="municipio_id" class="col-sm-3 col-form-label">Municipio nacim</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="municipio_id" name="municipio_id">
                                <option value="">(Seleccionar municipio de nacimiento)</option>
                                <?php
                                $sql2 = "SELECT 
                            m.municipio_id,
                            CONCAT_WS(': ', d.nombre, m.nombre) AS nombre
                        FROM
                            municipio m
                                JOIN
                            departamento d ON m.departamento_id = d.departamento_id
                        ORDER BY nombre";
                                $rs2 = mysqli_query($conexion, $sql2);
                                while ($rw1 = mysqli_fetch_assoc($rs2)) {

                                    echo "<option value='$rw1[municipio_id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefono" class="col-sm-3 col-form-label">Telefono</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                        </div>
                    </div>
                </form>
                <hr />

                <div class="form-group row mb-0">
                    <div id="div-pb" class="col-sm-12 text-center" style="display: none">
                        <img src="img/pb.gif" />
                    </div>

                    <div id="div-btn" class="col-sm-12 text-right">
                        <input type="button" class="btn btn-secondary" id="btn-guardar" value="Guardar">
                        <input type="button" class="btn btn-secondary" id="btn-limpiar" value="Limpiar" style="display: none">
                    </div>
                </div>



            </div>
        </div>
    </div>


    <script>
        $("#btn-guardar").click(function() {
            $.notifyClose();
            $("#div-pb").show();
            $("#div-btn").hide();
            var parametros = $("#formulario").serialize();
            $.post("guardar.php", parametros, function(respuesta) {
                $("#div-pb").hide();
                $("#div-btn").show();

                try {
                    var r = jQuery.parseJSON(respuesta);


                    if (r.error == true) {
                        $.notify({
                            message: r.msg
                        }, {
                            type: 'danger',
                            delay: 0
                        });
                    } else {
                        $("#formulario select, #formulario input").prop("disabled", true);
                        $("#btn-limpiar").show().prop("disabled", false);
                        $("#btn-guardar").hide();
                        $.notify({
                            message: r.msg
                        }, {
                            type: 'success',
                            delay: 0
                        });
                    }
                } catch (error) {
                    $.notify({
                        message: error + "<br/></br>" + respuesta
                    }, {
                        type: 'danger',
                        delay: 0
                    });
                }


            });

        });


        $("#btn-limpiar").click(function() {
            $.notifyClose();
            $("#formulario select, #formulario input").val("").prop("disabled", false);
            $("#btn-limpiar").hide();
            $("#btn-guardar").show();
        });
    </script>
</body>

</html>