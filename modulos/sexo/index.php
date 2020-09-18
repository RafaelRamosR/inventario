<div class="container mb-5">
    <div id="div-tabla" class="card">
        <div class="col-12 card-header">
            <h2 class="float-left">Registro de sexos</h2>
            <div>
                <button id="btn-buscar" class="btn btn-sm btn-primary ml-1 float-right">Buscar</button>
                <button id="btn-mostrar-formulario-agregar" class="btn btn-sm btn-success float-right">Agregar</button>
            </div>
        </div>

        <div id="listado" style="max-height:500px; overflow-y:auto;">

        </div>
    </div>

    <div id="div-formulario" class="container mt-4" style="max-width:700px; display: none">
        <div class="card mb-5">
            <div class="card-header">
                Agregar sexo
            </div>

            <div class="card-body">
                <form id="formulario" autocomplete="off">
                    <h6 class="card-title text-center">Sexo</h6>

                    <input type="hidden" name="id_sexo" id="id_sexo" />

                    <div class="form-group row">
                        <label for="sexo" class="col-sm-4 col-form-label">Ingrese el sexo</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="sexo" name="sexo">
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
        $("#listado").load("?modulo=sexo&accion=listar", parametros);
    }

    function modificar(id) {
        $("#div-tabla").hide();
        $("#div-formulario").show();
        $("#btn-agregar").hide();
        $("#btn-modificar").show();

        //Limpiar el formulario
        $("#formulario").trigger("reset");

        var parametros = "id=" + id;
        $.get("?modulo=sexo&accion=asignar", parametros, function(respuesta) {

            var r = jQuery.parseJSON(respuesta);

            $("#id_sexo").val(r.id_sexo);
            $("#sexo").val(r.nombre);
        });
    }

    function eliminar(id) {
        if (confirm("¿Realmente desea eliminar el registro?")) {
            var parametros = "id=" + id;
            $.post("?modulo=sexo&accion=eliminar", parametros, function(respuesta) {
                var r = jQuery.parseJSON(respuesta);
                alert(r.msg);
                if (r.error == false) {
                    cargar_tabla()
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
        var parametros = $("#formulario").serialize();
        $.post("?modulo=sexo&accion=agregar", parametros, function(respuesta) {
            r = JSON.parse(respuesta);
            alert(r.msg);
            if (r.error == false) {
                $("#div-tabla").show();
                $("#div-formulario").hide();
                cargar_tabla();
            }
        });
    });

    $("#btn-modificar").click(function() {
        if (confirm("¿Desea modificar el registro?")) {
            $("#div-pb").show();
            $("#div-btn").hide();
            var parametros = $("#formulario").serialize();
            $.post("?modulo=sexo&accion=modificar", parametros, function(respuesta) {
                $("#div-pb").hide();
                $("#div-btn").show();
                var r = jQuery.parseJSON(respuesta);
                alert(r.msg);
                if (r.error == false) {
                    cargar_tabla();
                    $("#div-tabla").show();
                    $("#div-formulario").hide();
                } else {
                    alert(r.error);
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