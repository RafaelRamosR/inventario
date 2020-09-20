<div class="container mb-5">
    <div id="div-tabla" class="card">
        <div class="col-12 card-header">
            <h2 class="float-left">Registro de entregas</h2>
            <div>
                <button id="btn-buscar" class="btn btn-sm btn-primary ml-1 float-right">Buscar</button>
                <a class="btn btn-sm btn-primary ml-1 float-right" href="?modulo=entrega&accion=reporte" role="button">Reporte</a>
                <button id="btn-mostrar-formulario-agregar" class="btn btn-sm btn-success float-right">Agregar</button>
            </div>
        </div>

        <div id="listado" style="max-height:500px; overflow-y:auto;">

        </div>
    </div>

    <div id="div-formulario" class="container mt-4" style="max-width:700px; display: none">
        <div class="card mb-5">
            <div class="card-header">
                Agregar entrega
            </div>

            <div class="card-body">
                <form id="formulario" method="post" action="?modulo=agregar-entrega" autocomplete="off">
                    <h6 class="card-title text-center">Entrega de</h6>
                    <input type="hidden" name="id_entrega" id="id_entrega" />
                    <div class="form-group row">
                        <label for="id_producto" class="col-sm-3 col-form-label">Producto</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="id_producto" name="id_producto">
                                <option value=""></option>
                                <?php
                                $sql1 = "SELECT * FROM producto ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_producto]'>$rw1[id_producto]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fecha_adquisicion" class="col-sm-3 col-form-label">Fecha de adquisicion</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fecha_entrega" class="col-sm-3 col-form-label">Fecha de entrega</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="referencia" class="col-sm-3 col-form-label">Referencia</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="referencia" name="referencia">
                                <option value=""></option>
                                <?php
                                $sql1 = "SELECT * FROM producto ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_producto]'>$rw1[referencia]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="responsable" class="col-sm-3 col-form-label">Responsable</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="responsable" name="responsable">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cantidad" class="col-sm-3 col-form-label">Cantidad</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cantidad" name="cantidad">
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
        $("#listado").load("?modulo=entrega&accion=listar", parametros);
    }

    function modificar(id) {
        $("#div-tabla").hide();
        $("#div-formulario").show();
        $("#btn-agregar").hide();
        $("#btn-modificar").show();

        //Limpiar el formulario
        $("#formulario").trigger("reset");

        var parametros = "id=" + id;
        $.get("?modulo=entrega&accion=asignar", parametros, function(respuesta) {

            var r = jQuery.parseJSON(respuesta);

            $("#id_entrega").val(r.id_entrega);
            $("#id_producto").val(r.id_producto);
            $("#fecha_adquisicion").val(r.fecha_adquisicion);
            $("#fecha_entrega").val(r.fecha_entrega);
            $("#referencia").val(r.referencia);
            $("#responsable").val(r.responsable);
            $("#cantidad").val(r.cantidad);
        });
    }

    function eliminar(id) {
        if (confirm("¿Realmente desea eliminar el registro?")) {
            var parametros = "id=" + id;
            $.post("?modulo=entrega&accion=eliminar", parametros, function(respuesta) {
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
        $.post("?modulo=entrega&accion=agregar", parametros, function(respuesta) {
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
            $.post("?modulo=entrega&accion=modificar", parametros, function(respuesta) {
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