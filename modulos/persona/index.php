<div class="container card mb-5">
    <div id="div-tabla">
        <div class="row">
            <div class="col-12 card-header">
                <h2 class="float-left">Registro de personas</h2>
                <div>
                    <button id="btn-buscar" class="btn btn-sm btn-primary ml-1 float-right">Buscar</button>
                    <button id="btn-mostrar-formulario-agregar" class="btn btn-sm btn-success float-right">Agregar</button>
                </div>
            </div>
        </div>

        <div id="listado" style="max-height:500px; overflow-y:auto;">

        </div>
    </div>

    <div id="div-formulario" class="container mt-4" style="max-width:700px; display: none">
        <div class="card mb-5">
            <div class="card-header">
                Agregar persona
            </div>

            <div class="card-body">
                <form id="formulario" autocomplete="off">
                    <h6 class="card-title text-center">DOCUMENTO DE IDENTIDAD</h6>

                    <input type="hidden" name="id_persona" id="id_persona" />

                    <div class="form-group row">
                        <label for="id_tipo_de_identificacion" class="col-sm-4 col-form-label">Tipo identificación</label>
                        <div class="col-sm-8">
                            <select class="form-control " id="id_tipo_de_identificacion" name="tipo_de_identificacion">
                                <option value=""></option>
                                <?php
                                $sql1 = "SELECT * FROM tipo_identidad ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_tipo_identidad]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Sexo" class="col-sm-4 col-form-label">Sexo</label>
                        <div class="col-sm-8">
                            <select class="form-control " id="sexo" name="sexo">
                                <option value=""></option>
                                <?php
                                $sql1 = "SELECT * FROM sexo ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_sexo]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Municipio" class="col-sm-4 col-form-label">Municipio de expedición</label>
                        <div class="col-sm-8">
                            <select class="form-control " id="municipio_expedicion" name="municipio_expedicion">
                                <option value=""></option>
                                <?php
                                $sql1 = "SELECT * FROM municipio ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr />

                    <div class="form-group row">
                        <label for="Muninacimiento" class="col-sm-4 col-form-label">Municipio de nacimiento</label>
                        <div class="col-sm-8">
                            <select class="form-control " id="municipio_nacimiento" name="municipio_nacimiento">
                                <option value=""></option>
                                <?php
                                $sql1 = "SELECT * FROM municipio ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="EstaCivil" class="col-sm-4 col-form-label">Estado civil</label>
                        <div class="col-sm-8">
                            <select class="form-control " id="estado_civil" name="estado_civil">
                                <option value=""></option>
                                <?php
                                $sql1 = "SELECT * FROM estado_civil ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_estado_civil]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="municipio_residencia" class="col-sm-4 col-form-label">Municipio de residencia</label>
                        <div class="col-sm-8">
                            <select class="form-control " id="municipio_residencia" name="municipio_residencia">
                                <option value=""></option>
                                <?php
                                $sql1 = "SELECT * FROM municipio ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="zona_residencia" class="col-sm-4 col-form-label">Zona de residencia</label>
                        <div class="col-sm-8">
                            <select class="form-control " id="zona_residencia" name="zona_residencia">
                                <option value=""></option>
                                <?php
                                $sql1 = "SELECT * FROM zona_de_residencia ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_zona_de_residencia]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="numero_identificacion" class="col-sm-4 col-form-label">Número de identificación</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha_expedicion" class="col-sm-4 col-form-label">Fecha de expedición</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="fecha_expedicion" name="fecha_expedicion">
                        </div>
                    </div>

                    <h6 class="card-title text-center">INFORMACIÓN PERSONAL</h6>
                    <div class="form-group row">
                        <label for="primer_nombre" class="col-sm-4 col-form-label">Primer nombre</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="primer_nombre" name="primer_nombre">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="segundo_nombre" class="col-sm-4 col-form-label">Segundo nombre</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="primer_apellido" class="col-sm-4 col-form-label">Primer apellido</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="segundo_apellido" class="col-sm-4 col-form-label">Segundo apellido</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha_nacimiento" class="col-sm-4 col-form-label">Fecha nacimiento</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Direccion" class="col-sm-4 col-form-label">Dirección</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>
                    </div>
                    <hr />
                    <h6 class="card-title text-center">INFORMACIÓN DE CONTACTO</h6>
                    <div class="form-group row">
                        <label for="correo_principal" class="col-sm-4 col-form-label">Correo principal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="correo_principal" name="correo_principal">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="correo_alternativo" class="col-sm-4 col-form-label">Correo alternativo</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="correo_alternativo" name="correo_alternativo">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="telefono_principal" class="col-sm-4 col-form-label">Teléfono principal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="telefono_principal" name="telefono_principal">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefono_alternativo" class="col-sm-4 col-form-label">Teléfono alternativo</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="telefono_alternativo" name="telefono_alternativo">
                        </div>
                    </div>

                    <label for="cargo" class="col-sm-4 col-form-label">Cargo</label>
                    <div class="col-sm-8">
                        <select class="form-control " id="cargo" name="cargo">
                            <option value=""></option>
                            <?php
                            $sql1 = "SELECT * FROM cargo ORDER BY nombre";
                            $rs1 = mysqli_query($conexion, $sql1);
                            while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                echo "<option value='$rw1[id_cargo]'>$rw1[nombre]</option>";
                            }
                            ?>
                        </select>
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
        $("#listado").load("?modulo=persona&accion=listar", parametros);
    }

    function modificar(id) {
        $("#div-tabla").hide();
        $("#div-formulario").show();
        $("#btn-agregar").hide();
        $("#btn-modificar").show();

        //Limpiar el formulario
        $("#formulario").trigger("reset");

        var p = "id=" + id;
        $.get("?modulo=persona&accion=asignar", p, function(respuesta) {
            var r = jQuery.parseJSON(respuesta);
            $("#persona_id").val(r.persona_id);
            $("#tipo_identificacion_id").val(r.tipo_identificacion_id);
            $("#identificacion").val(r.identificacion);
            $("#nombre").val(r.nombre);
            $("#apellido").val(r.apellido);
            $("#fecha_nacimiento").val(r.fecha_nacimiento);
            $("#municipio_id").val(r.municipio_id);
            $("#telefono").val(r.telefono);
        });
    }

    function eliminar(id) {

        if (confirm("¿Desea eliminar el registro?")) {
            var p = "persona_id=" + id;
            $.post("?modulo=persona&accion=eliminar", p, function(respuesta) {

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
        $.post("?modulo=persona&accion=agregar", parametros, function(respuesta) {
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
            $.post("?modulo=persona&accion=modificar", parametros, function(respuesta) {
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