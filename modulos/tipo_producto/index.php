<?php
require_once("conexion.php");
?>
    <div id="contenedor-listado" class="content mt-3" style="width:900px; margin:auto">

        <div class="card">
            
            <div class="card-header">
                Tipo producto
                <button id="btn-mostrar-filtros" class="btn btn-sm btn-secondary float-right ml-1">Buscar</button>

                <button id="btn-agregar" class="btn btn-sm btn-secondary float-right ml-1">Agregar</button>
            </div>

            
            <div id="div-formulario-busqueda" class="card-body d-none">

                <form id="formulario-busqueda">
                   
                    <div class="form-group row">
                        <label for="tipo_producto" class="col-sm-3 col-form-label">Tipo de producto</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="tipo_producto">
                                <option value="">(Seleccione tipo de producto)</option>
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
                <span id="titulo"><strong>Tipo producto</strong></span>
            </div>

            <div class="card-body">

                <form id="formulario" method="post" action="agregar.php" autocomplete="off">
                    <h6 class="card-title text-center">Tipo producto</h6>
              
                    <input type="hidden" name="id_tipo_producto" id="id_tipo_producto" />
                    
                   

                    <div class="form-group row">
                        <label for="cargo" class="col-sm-3 col-form-label">Ingrese el tipo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tipo_producto" name="tipo_producto">
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
            $.post("?modulo=tipo_producto&accion=agregar", parametros, function(respuesta) {
                //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
                 r= JSON.parse(respuesta);
                // console.log(r);
                 alert(r.msg);
                if (r.error == false) {
                    $("#contenedor-listado").show();
                    $("#contenedor-formulario").hide();

                      cargar_listado()
                }

            });

        });



        $("#btn-modificar").click(function() {
            if (confirm("¿Desea modificar el registro?")) {
                var parametros = $("#formulario").serialize();
                $.post("?modulo=tipo_producto&accion=modificar", parametros, function(respuesta) {
                    //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.msg);
                    if (r.error == false) {
                        $("#contenedor-listado").show();
                        $("#contenedor-formulario").hide();
            $("#listado").load("?modulo=tipo_producto&accion=listado", parametros);
                    }
                });
            }
        });
            

        $("#btn-regresar").click(function() {
            $("#contenedor-listado").show();
            $("#contenedor-formulario").hide();
        });

        function mostrar(id_tipo_producto) {
            var parametros = "id_tipo_producto=" + id_tipo_producto;
            $.get("?modulo=tipo_producto&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide(); 
                $("#btn-modificar").hide();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", true);

                var r = jQuery.parseJSON(respuesta);
                
                $("#id_tipo_producto").val(r.id_tipo_producto);
                $("#tipo_producto").val(r.nombre);
            });
        }



        function eliminar(id_tipo_producto) {
            if (confirm("¿Realmente desea eliminar el registro?")) {
                var parametros = "id_tipo_producto=" + id_tipo_producto;
                $.post("?modulo=tipo_producto&accion=eliminar", parametros, function(respuesta) {
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.msg);
                    if (r.error == false) {
                         cargar_listado()
                    }
                });
            }
        }


        function modificar(id_tipo_producto) {
            var parametros = "id_tipo_producto=" + id_tipo_producto;
            $.get("?modulo=tipo_producto&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide();
                $("#btn-modificar").show();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", false);
                $("#identificacion").prop("disabled", true);


                var r = jQuery.parseJSON(respuesta);
                
                $("#id_tipo_producto").val(r.id_tipo_producto);
                $("#tipo_producto").val(r.nombre);
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
         $("#listado").load("?modulo=tipo_producto&accion=listar", parametros);
     }
    </script>