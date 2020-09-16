<?php
require_once("conexion.php");
?>
    <div id="contenedor-listado" class="content mt-3" style="width:900px; margin:auto">

        <div class="card">
            
        <div class="card-header">
                Cargo
                <button id="btn-mostrar-filtros" class="btn btn-sm btn-secondary float-right ml-1">Buscar</button>

                <button id="btn-agregar" class="btn btn-sm btn-secondary float-right ml-1">Agregar</button>
            </div>

            
            <div id="div-formulario-busqueda" class="card-body d-none">

                <form id="formulario-busqueda">

                    <div class="form-group row">
                        <label for="cargo2" class="col-sm-3 col-form-label">Cargo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="cargo2" placeholder="Cargo">
                        </div>
                    </div>
                    
                    <hr />
                    <div class="form-group row mb-0">
                        <div class="col-sm-12 text-right">
                            <button type="button" id="btn-buscar" class="btn btn-sm btn-secondary">Buscar</button>
                        </div>
                    </div>
                </form>
                
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
                <span id="titulo"><strong>Cargo</strong></span>
            </div>

            <div class="card-body">

                <form id="formulario" autocomplete="off">
                    <h6 class="card-title text-center">Cargo</h6>
              
                    <input type="hidden" name="id_cargo" id="id_cargo" />
                    
                   

                    <div class="form-group row">
                        <label for="cargo" class="col-sm-3 col-form-label">Ingrese el cargo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cargo" name="cargo">
                        </div>
                    </div>

                   

                   
            
                </form>
              </div>
            </div>
            
            
            
    <!-- LISTA DE BOTONES CON EVENTOS -->        
            <div class="card-footer text-right">
                <button type="button" id="btn-regresar" class="btn btn-sm btn-light">Regresar</button>
                <button type="button" id="btn-guardar" class="btn btn-sm btn-secondary">Guardar</button>
                <button type="button" id="btn-modificar" class="btn btn-sm btn-secondary">Modificar</button>
            </div>
            
<!-- FIN DEL FORMULARIO -->
        </div>
        
    </div>
    <br><br><br><br><br>
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
            $.post("?modulo=cargo&accion=agregar", parametros, function(respuesta) {
                //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
                 r= JSON.parse(respuesta);
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
                $.post("?modulo=cargo&accion=modificar", parametros, function(respuesta) {
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

        function mostrar(id_cargo) {
            var parametros = "id_cargo=" + id_cargo;
            $.get("?modulo=cargo&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide(); 
                $("#btn-modificar").hide();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", true);

                var r = jQuery.parseJSON(respuesta);

                $("#cargo").val(r.nombre);
                
              

            });
        }



        function eliminar(id_cargo) {
            if (confirm("¿Realmente desea eliminar el registro?")) {
                var parametros = "id_cargo=" + id_cargo;
                $.post("?modulo=cargo&accion=eliminar", parametros, function(respuesta) {
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.msg);
                    if (r.error == false) {
                         cargar_listado();
                    }
                });
            }
        }


        function modificar(id_cargo) {
            var parametros = "id_cargo=" + id_cargo;
            $.get("?modulo=cargo&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide();
                $("#btn-modificar").show();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", false);
                $("#identificacion").prop("disabled", true);


                var r = jQuery.parseJSON(respuesta);

                $("#id_cargo").val(r.id_cargo);
                $("#cargo").val(r.nombre);
                
            });
        }
   

        $("#btn-mostrar-filtros").click(function() {
            $("#div-formulario-busqueda").toggleClass("d-none");
        });

        $("#btn-buscar").click(function() {
            cargar_listado();
        });

        function cargar_listado() {
            var parametros = $("#formulario-busqueda").serialize() + "&" + 
            $("#formulario-paginacion").serialize();
            $("#listado").load("?modulo=cargo&accion=listar", parametros);
        }
    </script>