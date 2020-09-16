<?php
require_once("conexion.php");
?>
        <div id="contenedor-listado" class="content mt-3" style="width:900px; margin:auto">

        <div class="card">
            
            <div class="card-header">
                Informe producto
                <button id="btn-mostrar-filtros" class="btn btn-sm btn-primary ml-1 float-right">Buscar</button>

                <button id="btn-agregar" class="btn btn-sm btn-success float-right">Agregar</button>
            </div>

            
            <div id="div-formulario-busqueda" class="card-body d-none">

                <form id="formulario-busqueda">

                    <div class="form-group row">
                        <label for="nombre_producto" class="col-sm-3 col-form-label">Nombre producto</label>
                        <div class="col-sm-9">
                            <select class="form-control " name="nombre_producto">
                                <option value="">(Seleccionar producto)</option>
                                <?php
                                $sql1 = "SELECT * FROM producto ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_producto]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipo_producto" class="col-sm-3 col-form-label">Tipo de producto</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="tipo_producto">
                                <option value="">(Seleccionar tipo de producto)</option>
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
                        <label for="modelo" class="col-sm-3 col-form-label">Modelo del producto</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="modelo">
                                <option value="">(Seleccionar modelo)</option>
                                <?php
                                $sql1 = "SELECT * FROM producto GROUP BY modelo";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {
                                    echo "<option value='$rw1[modelo]'>$rw1[modelo]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha_adquisicion" class="col-sm-3 col-form-label">Fecha adquisicion</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="fecha_adquisicion">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="proveedor" class="col-sm-3 col-form-label">Proveedor</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="proveedor">
                                <option value="">(Seleccionar proveedor)</option>
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
                        <label for="referencia" class="col-sm-3 col-form-label">referencia</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="referencia">
                                <option value="">(Seleccionar referencia)</option>
                                <?php
                                $sql1 = "SELECT * FROM producto GROUP BY referencia";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {
                                    echo "<option value='$rw1[referencia]'>$rw1[referencia]</option>";
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
                <span id="titulo"><strong>Formulario</strong></span>
            </div>

            <div class="card-body">

                <form id="formulario" method="post" action="?modulo=agregar-persona" autocomplete="off">
                    <h6 class="card-title text-center">Informe del producto</h6>
              
                    <input type="hidden" name="id_producto" id="id_producto" />

                    
                    <div class="form-group row">
                        <label for="nombreproducto" class="col-sm-3 col-form-label">Nombre del producto</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="tipo_producto" class="col-sm-3 col-form-label">Tipo de producto</label>
                        <div class="col-sm-9">
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
                        <label for="modelo_producto" class="col-sm-3 col-form-label">Modelo del producto</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="modelo_producto" name="modelo_producto">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stock" class="col-sm-3 col-form-label">Productos disponibles</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="stock" name="stock">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha_adquisicion" class="col-sm-3 col-form-label">Fecha de adquisición</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="proveedores" class="col-sm-3 col-form-label">Proveedor</label>
                        <div class="col-sm-9">
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
                        <label for="referencia" class="col-sm-3 col-form-label">Referencia del producto</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="referencia" name="referencia">
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
            $.post("?modulo=producto&accion=agregar", parametros, function(respuesta) {
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
                $.post("?modulo=producto&accion=modificar", parametros, function(respuesta) {
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

        function mostrar(id_producto) {
            var parametros = "id_producto=" + id_producto;
            $.get("?modulo=producto&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide(); 
                $("#btn-modificar").hide();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", true);

                var r = jQuery.parseJSON(respuesta);

                $("#nombre_producto").val(r.nombre);
                $("#tipo_producto").val(r.id_tipo_producto);
                $("#modelo_producto").val(r.modelo);
                $("#stock").val(r.stock);
                $("#fecha_adquisicion").val(r.fecha_adquisicion);
                $("#proveedores").val(r.id_provedore);
                $("#referencia").val(r.referencia);
                
              

            });
        }



        function eliminar(id_producto) {
            if (confirm("¿Realmente desea eliminar el registro?")) {
                var parametros = "id_producto=" + id_producto;
                $.post("?modulo=producto&accion=eliminar", parametros, function(respuesta) {
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.msg);
                    if (r.error == false) {
                         cargar_listado()
                    }
                });
            }
        }


        function modificar(id_producto) {
            var parametros = "id_producto=" + id_producto;
            $.get("?modulo=producto&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide();
                $("#btn-modificar").show();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", false);
                $("#identificacion").prop("disabled", true);


                var r = jQuery.parseJSON(respuesta);

                $("#id_producto").val(r.id_producto);
                $("#nombre_producto").val(r.nombre);
                $("#tipo_producto").val(r.id_tipo_producto);
                $("#modelo_producto").val(r.modelo);
                $("#stock").val(r.stock);
                $("#fecha_adquisicion").val(r.fecha_adquisicion);
                $("#proveedores").val(r.id_provedore);
                $("#referencia").val(r.referencia);
                
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
            $("#listado").load("?modulo=producto&accion=listar", parametros);
        }
    </script>