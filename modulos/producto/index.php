<div class="container mb-5">
    <div id="div-tabla" class="card">
        <div class="col-12 card-header">
            <h2 class="float-left">Registro de productos</h2>
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
                Agregar producto
            </div>

            <div class="card-body">
                <form id="formulario" autocomplete="off">
                    <h6 class="card-title text-center">Informe del producto</h6>
                    <input type="hidden" name="id_producto" id="id_producto" />
                    <div class="form-group row">
                        <label for="nombreproducto" class="col-sm-4 col-form-label">Nombre del producto</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipo_producto" class="col-sm-4 col-form-label">Tipo de producto</label>
                        <div class="col-sm-8">
                            <select class="form-control " id="tipo_producto" name="tipo_producto">
                                <option value=""></option>
                                <?php
                                $sql1 = "SELECT * FROM tipo_producto ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_tipo_producto]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="modelo_producto" class="col-sm-4 col-form-label">Modelo del producto</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="modelo_producto" name="modelo_producto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stock" class="col-sm-4 col-form-label">Productos disponibles</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="stock" name="stock">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fecha_adquisicion" class="col-sm-4 col-form-label">Fecha de adquisición</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="proveedores" class="col-sm-4 col-form-label">Proveedor</label>
                        <div class="col-sm-8">
                            <select class="form-control " id="proveedores" name="proveedores">
                                <option value=""></option>
                                <?php
                                $sql1 = "SELECT * FROM proveedores ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_proveedor]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="referencia" class="col-sm-4 col-form-label">Referencia del producto</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="referencia" name="referencia">
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
        $("#listado").load("?modulo=producto&accion=listar", parametros);
    }

    function modificar(id) {
        $("#div-tabla").hide();
        $("#div-formulario").show();
        $("#btn-agregar").hide();
        $("#btn-modificar").show();

        //Limpiar el formulario
        $("#formulario").trigger("reset");

        var parametros = "id=" + id;
        $.get("?modulo=producto&accion=asignar", parametros, function(respuesta) {

            var r = jQuery.parseJSON(respuesta);

            $("#id_persona").val(r.id_persona);
            $("#id_tipo_de_identificacion").val(r.id_tipo_de_identificacion);
            $("#sexo").val(r.id_sexo);
            $("#municipio_expedicion").val(r.id_municipio_expedicion);
            $("#municipio_nacimiento").val(r.id_municipio_de_nacimiento);
            $("#estado_civil").val(r.id_estado_civil);
            $("#municipio_residencia").val(r.id_municipio_de_residencia);
            $("#zona_residencia").val(r.id_zona_residencia);
            $("#numero_identificacion").val(r.Num_Identificacion);
            $("#fecha_expedicion").val(r.fecha_expedicion);
            $("#primer_nombre").val(r.primer_nombre);
            $("#segundo_nombre").val(r.segundo_nombre);
            $("#primer_apellido").val(r.primer_apellido);
            $("#segundo_apellido").val(r.segundo_apellido);
            $("#fecha_nacimiento").val(r.fecha_nacimiento);
            $("#direccion").val(r.direccion);
            $("#correo_principal").val(r.correo_principal);
            $("#correo_alternativo").val(r.correo_alternativo);
            $("#telefono_principal").val(r.telefono_principal);
            $("#telefono_alternativo").val(r.telefono_alternativo);
            $("#cargo").val(r.id_cargo);
        });
    }

    function eliminar(id) {
        if (confirm("¿Realmente desea eliminar el registro?")) {
            var parametros = "id=" + id;
            $.post("?modulo=producto&accion=eliminar", parametros, function(respuesta) {
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
        $.post("?modulo=producto&accion=agregar", parametros, function(respuesta) {
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
            $.post("?modulo=producto&accion=modificar", parametros, function(respuesta) {
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