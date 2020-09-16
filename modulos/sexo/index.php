<?php
require_once("conexion.php");
?>
    <div id="contenedor-listado" class="content mt-3" style="width:900px; margin:auto">

        <div class="card">
            
            <div class="card-header">
                Sexo
                <button id="btn-mostrar-filtros" class="btn btn-sm btn-secondary float-right ml-1">Buscar</button>

                <button id="btn-agregar" class="btn btn-sm btn-secondary float-right ml-1">Agregar</button>
            </div>

            
            <div id="div-formulario-busqueda" class="card-body d-none">

                <form id="formulario-busqueda">

                    <div class="form-group row">
                        <label for="sexo" class="col-sm-3 col-form-label">Sexo</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="sexo">
                                <option value="">(Seleccionar sexo)</option>
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
                <span id="titulo"><strong>Sexo</strong></span>
            </div>

            <div class="card-body">

                <form id="formulario" autocomplete="off">
                    <h6 class="card-title text-center">Sexo</h6>
              
                    <input type="hidden" name="id_sexo" id="id_sexo" />

                    <div class="form-group row">
                        <label for="sexo" class="col-sm-3 col-form-label">Ingrese el sexo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="sexo" name="sexo">
                        </div>
                    </div>
                </form>
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
            $.post("?modulo=sexo&accion=agregar", parametros, function(respuesta) {
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
                $.post("?modulo=sexo&accion=modificar", parametros, function(respuesta) {
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

        function mostrar(id_sexo) {
            var parametros = "id_sexo=" + id_sexo;
            $.get("?modulo=sexo&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide(); 
                $("#btn-modificar").hide();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", true);

                var r = jQuery.parseJSON(respuesta);

                
                $("#sexo").val(r.nombre);
            });
        }



        function eliminar(id_sexo) {
            if (confirm("¿Realmente desea eliminar el registro?")) {
                var parametros = "id_sexo=" + id_sexo;
                $.post("?modulo=sexo&accion=eliminar", parametros, function(respuesta) {
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.msg);
                    if (r.error == false) {
                         cargar_listado()
                    }
                });
            }
        }


        function modificar(id_sexo) {
            var parametros = "id_sexo=" + id_sexo;
            $.get("?modulo=sexo&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide();
                $("#btn-modificar").show();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", false);
                $("#identificacion").prop("disabled", true);


                var r = jQuery.parseJSON(respuesta);
                
                $("#id_sexo").val(r.id_sexo);
                $("#sexo").val(r.nombre);
                
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
         $("#listado").load("?modulo=sexo&accion=listar", parametros);
     }
    </script>