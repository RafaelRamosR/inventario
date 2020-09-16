<?php
require_once("conexion.php");
?>
    <div id="contenedor-listado" class="content mt-3" style="width:900px; margin:auto">

        <div class="card">
            
        <div class="card-header">
                Entrega
                <button id="btn-mostrar-filtros" class="btn btn-sm btn-secondary float-right ml-1">Buscar</button>

                <button id="btn-agregar" class="btn btn-sm btn-secondary float-right ml-1">Agregar</button>
            </div>

            
            <div id="div-formulario-busqueda" class="card-body d-none">

                <form id="formulario-busqueda">

                    <div class="form-group row">
                        <label for="fecha_adquisicion2" class="col-sm-3 col-form-label">Producto</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="producto" placeholder="Producto">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha_adquisicion2" class="col-sm-3 col-form-label">Adquisición</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="fecha_adquisicion2">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha_entrega2" class="col-sm-3 col-form-label">Entrega</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="fecha_entrega2">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="referencia2" class="col-sm-3 col-form-label">Referencia</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="referencia2">
                                <option value="">(Seleccione la referencia)</option>
                                <?php
                                $sql1 = "SELECT * FROM entrega ORDER BY referencia";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[referencia]'>$rw1[referencia]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="responsable2" class="col-sm-3 col-form-label">Responsable</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="responsable2" placeholder="Responsable">
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
                <span id="titulo"><strong>Entrega</strong></span>
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
            $.post("?modulo=entrega&accion=agregar", parametros, function(respuesta) {
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
                $.post("?modulo=entrega&accion=modificar", parametros, function(respuesta) {
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

        function mostrar(id_entrega) {
            var parametros = "id_entrega=" + id_entrega;
            $.get("?modulo=entrega&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide(); 
                $("#btn-modificar").hide();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", true);

                var r = jQuery.parseJSON(respuesta);

                $("#id_producto").val(r.id_producto);
                $("#fecha_adquisicion").val(r.fecha_adquisicion);
                $("#fecha_entrega").val(r.fecha_entrega);
                $("#referencia").val(r.referencia);
                $("#responsable").val(r.responsable);
                $("#cantidad").val(r.cantidad);
            });
        }



        function eliminar(id_entrega) {
            if (confirm("¿Realmente desea eliminar el registro?")) {
                var parametros = "id_entrega=" + id_entrega;
                $.post("?modulo=entrega&accion=eliminar", parametros, function(respuesta) {
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.msg);
                    if (r.error == false) {
                         cargar_listado();
                    }
                });
            }
        }


        function modificar(id_entrega) {
            var parametros = "id_entrega=" + id_entrega;
            $.get("?modulo=entrega&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide();
                $("#btn-modificar").show();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", false);
                $("#identificacion").prop("disabled", true);


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
   

        $("#btn-mostrar-filtros").click(function() {
            $("#div-formulario-busqueda").toggleClass("d-none");
        });

        $("#btn-buscar").click(function() {
            cargar_listado();
        });

        function cargar_listado() {
            var parametros = $("#formulario-busqueda").serialize() + "&" + 
            $("#formulario-paginacion").serialize();
            $("#listado").load("?modulo=entrega&accion=listar", parametros);
        }
    </script>