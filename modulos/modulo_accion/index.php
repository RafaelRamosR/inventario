<div class="container mb-5">
    <div id="div-tabla" class="card">
        <div class="col-12 card-header">
            <h2 class="float-left">Registro de modulos y acciones</h2>
            <div>
                <button id="btn-buscar" class="btn btn-sm btn-primary ml-1 float-right">Buscar</button>
                <a class="btn btn-sm btn-primary ml-1 float-right" href="?modulo=modulo_accion&accion=reporte" role="button">Reporte</a>
                <button id="btn-mostrar-formulario-agregar" class="btn btn-sm btn-success float-right">Agregar</button>
            </div>
        </div>

        <div id="listado" style="max-height:500px; overflow-y:auto;">

        </div>
    </div>

    <div id="div-formulario" class="container mt-4" style="max-width:700px; display: none">
        <div class="card mb-5">
            <div class="card-header">
                Agregar modulo acción
            </div>

            <div class="card-body">
                <form id="formulario" autocomplete="off">
                    <input type="hidden" name="id_modulo_accion" id="id_modulo_accion" />

                    <div class="form-group row">
                        <label for="modulo" class="col-sm-3 col-form-label">Modulo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="modulo" name="modulo" placeholder="Nombre de modulo">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="accion" class="col-sm-3 col-form-label">Accion</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="accion" name="accion" placeholder="Nombre de accion">
                        </div>
                    </div>
                </form>

                <div class="form-group row pt-5">
                    <div id="div-pb" class="col-sm-12 text-center" style="display: none">
                        <img src="img/pb.gif" />
                    </div>

                    <div id="div-btn" class="col-sm-12 text-right">
                        <input type="button" class="btn btn-success" id="btn-agregar" value="Guardar">
                        <input type="button" class="btn btn-success" id="btn-modificar" value="Modificar">
                        <input type="button" class="btn btn-secondary" id="btn-regresar" value="Regresar">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var pagina_actual = 1;

    function mover_pagina(pagina) {
        if (pagina < 1) {
            return;
        }

        var cantidad_paginas = parseInt($("#cantidad_paginas").val());
        if (pagina > cantidad_paginas) {
            return;
        }

        pagina_actual = pagina;
        cargar_tabla();
    }

    function cargar_tabla() {
        var parametros = $("#form-filtros").serialize();
        parametros = parametros + "&pagina_actual=" + pagina_actual;
        $("#listado").html('<div class="text-center"><img src="img/pb.gif"/></div>');
        $("#listado").load("?modulo=modulo_accion&accion=listar", parametros);
    }

    function modificar(id) {
        $("#div-tabla").hide();
        $("#div-formulario").show();
        $("#btn-agregar").hide();
        $("#btn-modificar").show();

        //Limpiar el formulario
        $("#formulario").trigger("reset");

        var parametros = "id=" + id;
        $.get("?modulo=modulo_accion&accion=asignar", parametros, function(respuesta) {

            var r = jQuery.parseJSON(respuesta);

            $("#id_modulo_accion").val(r.id_modulo_accion);
            $("#modulo").val(r.modulo);
            $("#accion").val(r.accion);
        });
    }

    function eliminar(id) {
        if (confirm("¿Realmente desea eliminar el registro?")) {
            var parametros = "id=" + id;
            $.post("?modulo=modulo_accion&accion=eliminar", parametros, function(respuesta) {
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
                        cargar_tabla();
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
        }
    }

    cargar_tabla();

    $("#btn-mostrar-formulario-agregar").click(function() {
        $("#div-tabla").hide();
        $("#div-formulario").show();

        //Limpiar el formulario
        $("#formulario").trigger("reset");
        $("#btn-agregar").show();
        $("#btn-modificar").hide();
    });

    $("#btn-agregar").click(function() {
        $.notifyClose();
        $("#div-pb").show();
        $("#div-btn").hide();
        var parametros = $("#formulario").serialize();
        $.post("?modulo=modulo_accion&accion=agregar", parametros, function(respuesta) {
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
                    cargar_tabla();
                    $("#div-tabla").show();
                    $("#div-formulario").hide();
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

    $("#btn-modificar").click(function() {
        if (confirm("¿Desea modificar el registro?")) {
            $.notifyClose();
            $("#div-pb").show();
            $("#div-btn").hide();
            var parametros = $("#formulario").serialize();
            $.post("?modulo=modulo_accion&accion=modificar", parametros, function(respuesta) {
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
                        cargar_tabla();
                        $("#div-tabla").show();
                        $("#div-formulario").hide();
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
        }
    });

    $("#btn-regresar").click(function() {
        $("#div-tabla").show();
        $("#div-formulario").hide();
    });

    $("#btn-buscar").click(function() {
        $("#tr-filtros").toggleClass("d-none");
    });
</script>