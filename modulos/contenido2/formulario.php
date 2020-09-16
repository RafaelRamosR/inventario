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
                Agregar contenido
            </div>

            <div class="card-body">
                <form id="formulario" method="post">

                    <div class="form-group row">
                        <label for="titulo" class="col-sm-3 col-form-label">Titulo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="modulo" class="col-sm-3 col-form-label">Modulo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="modulo" name="modulo" placeholder="Modulo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contenido" class="col-sm-3 col-form-label">Contenido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="contenido" name="contenido" placeholder="Contenido">
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