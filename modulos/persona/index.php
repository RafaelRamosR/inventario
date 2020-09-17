<?php
require_once("conexion.php");
?>
<div id="contenedor-listado" class="content mt-3" style="width:900px; margin:auto">
    <div class="card">
        <div class="card-header">
            Listado de personas
            <button id="btn-buscar" class="btn btn-sm btn-primary ml-1 float-right ">Buscar</button>
            <button id="btn-agregar" class="btn btn-sm btn-success float-right">Agregar</button>
        </div>
        <div id="listado">
            <?php
            require_once("listado.php");
            ?>
        </div>
    </div>
</div>

<div id="contenedor-formulario" class="container mt-5" style="max-width:700px; display:none">
    <div class="card">

        <div class="card-header">
            <span id="titulo"><strong>Formulario</strong></span>
        </div>

        <div class="card-body">

            <form id="formulario" autocomplete="off">
                <h6 class="card-title text-center">DOCUMENTO DE IDENTIDAD</h6>

                <input type="hidden" name="id_persona" id="id_persona" />

                <div class="form-group row">
                    <label for="id_tipo_de_identificacion" class="col-sm-3 col-form-label">Tipo identificación</label>
                    <div class="col-sm-9">
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
                    <label for="Sexo" class="col-sm-3 col-form-label">Sexo</label>
                    <div class="col-sm-9">
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
                    <label for="Municipio" class="col-sm-3 col-form-label">Municipio de expedición</label>
                    <div class="col-sm-9">
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
                    <label for="Muninacimiento" class="col-sm-3 col-form-label">Municipio de nacimiento</label>
                    <div class="col-sm-9">
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
                    <label for="EstaCivil" class="col-sm-3 col-form-label">Estado civil</label>
                    <div class="col-sm-9">
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
                    <label for="municipio_residencia" class="col-sm-3 col-form-label">Municipio de residencia</label>
                    <div class="col-sm-9">
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
                    <label for="zona_residencia" class="col-sm-3 col-form-label">Zona de residencia</label>
                    <div class="col-sm-9">
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
                    <label for="numero_identificacion" class="col-sm-3 col-form-label">Número de identificación</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fecha_expedicion" class="col-sm-3 col-form-label">Fecha de expedición</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="fecha_expedicion" name="fecha_expedicion">
                    </div>
                </div>

                <h6 class="card-title text-center">INFORMACIÓN PERSONAL</h6>
                <div class="form-group row">
                    <label for="primer_nombre" class="col-sm-3 col-form-label">Primer nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="segundo_nombre" class="col-sm-3 col-form-label">Segundo nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="primer_apellido" class="col-sm-3 col-form-label">Primer apellido</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="segundo_apellido" class="col-sm-3 col-form-label">Segundo apellido</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fecha_nacimiento" class="col-sm-3 col-form-label">Fecha nacimiento</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Direccion" class="col-sm-3 col-form-label">Dirección</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="direccion" name="direccion">
                    </div>
                </div>
                <hr />
                <h6 class="card-title text-center">INFORMACIÓN DE CONTACTO</h6>
                <div class="form-group row">
                    <label for="correo_principal" class="col-sm-3 col-form-label">Correo principal</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="correo_principal" name="correo_principal">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="correo_alternativo" class="col-sm-3 col-form-label">Correo alternativo</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="correo_alternativo" name="correo_alternativo">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="telefono_principal" class="col-sm-3 col-form-label">Teléfono principal</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="telefono_principal" name="telefono_principal">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefono_alternativo" class="col-sm-3 col-form-label">Teléfono alternativo</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="telefono_alternativo" name="telefono_alternativo">
                    </div>
                </div>
                <hr />

                <label for="cargo" class="col-sm-3 col-form-label">Cargo</label>
                <div class="col-sm-9">
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
        </div>
        </form>
    </div>
    <div class="card-footer text-right">
        <button type="button" id="btn-regresar" class="btn btn-sm btn-light">Regresar</button>
        <button type="button" id="btn-guardar" class="btn btn-sm btn-secondary">Guardar</button>
        <button type="button" id="btn-modificar" class="btn btn-sm btn-secondary">Modificar</button>
    </div>
</div>

<script type="text/javascript">
    $("#btn-agregar").click(function() {
        $("#contenedor-listado").hide();
        $("#contenedor-formulario").show();

        $("#btn-listado").show();
        $("#btn-modificar").hide();
        $("#btn-guardar").show();
        $("#formulario")[0].reset(); //limpiar formulario
        $("#formulario input, #formulario select").prop("disabled", false);

    });

    $("#btn-guardar").click(function() {
        var parametros = $("#formulario").serialize();
        $.post("?modulo=persona&accion=agregar", parametros, function(respuesta) {
            //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
            r = JSON.parse(respuesta);
            // console.log(r);
            alert(r.msg);
            if (r.error == false) {
                $("#contenedor-listado").show();
                $("#contenedor-formulario").hide();
                cargar_listado();
            }

        });

    });

    $("#btn-modificar").click(function() {
        if (confirm("¿Desea modificar el registro?")) {
            var parametros = $("#formulario").serialize();
            $.post("?modulo=persona&accion=modificar", parametros, function(respuesta) {
                //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
                var r = jQuery.parseJSON(respuesta);
                alert(r.msg);
                if (r.error == false) {
                    $("#contenedor-listado").show();
                    $("#contenedor-formulario").hide();
                    cargar_listado();
                }
            });
        }
    });

    $("#btn-regresar").click(function() {
        $("#contenedor-listado").show();
        $("#contenedor-formulario").hide();
    });

    function mostrar(id_persona) {
        var parametros = "id_persona=" + id_persona;
        $.get("?modulo=persona&accion=datos", parametros, function(respuesta) {
            $("#formulario")[0].reset(); //limpiar formulario
            $("#contenedor-listado").hide(); //ocultar
            $("#contenedor-formulario").show(); //mostrar

            $("#btn-guardar").hide();
            $("#btn-modificar").hide();
            $("#formulario")[0].reset(); //limpiar formulario
            $("#formulario input, #formulario select").prop("disabled", true);

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

    function eliminar(id_persona) {
        if (confirm("¿Realmente desea eliminar el registro?")) {
            var parametros = "id_persona=" + id_persona;
            $.post("?modulo=persona&accion=eliminar", parametros, function(respuesta) {
                var r = jQuery.parseJSON(respuesta);
                alert(r.msg);
                if (r.error == false) {
                    cargar_listado()
                }
            });
        }
    }

    function modificar(id_persona) {
        var parametros = "id_persona=" + id_persona;
        $.get("?modulo=persona&accion=datos", parametros, function(respuesta) {
            $("#formulario")[0].reset(); //limpiar formulario
            $("#contenedor-listado").hide(); //ocultar
            $("#contenedor-formulario").show(); //mostrar

            $("#btn-guardar").hide();
            $("#btn-modificar").show();
            $("#formulario")[0].reset(); //limpiar formulario
            $("#formulario input, #formulario select").prop("disabled", false);
            $("#identificacion").prop("disabled", true);


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

    $("#btn-buscar").click(function() {
        $("#tr-filtros").toggleClass("d-none");
    });

    function cargar_listado() {
        var parametros = $("#formulario-busqueda").serialize() + "&" +
            $("#formulario-paginacion").serialize();
        $("#listado").load("?modulo=persona&accion=listar", parametros);
    }

    $("#buscar").click(function() {
        cargar_listado();
    });
</script>