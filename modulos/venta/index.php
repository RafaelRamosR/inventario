<?php
require_once("conexion.php");


?>

<!doctype html>
<html lang="es">

<head>

    <title>Ventas</title>
    <style type="text/css">
       

        /*
        .acciones a:hover {
          
            color:red ;
        }
    */

        .acciones a.eliminar {
            color: orange !important;
        }

        .acciones a.eliminar:hover {
            color: orange !important;
        }

        .acciones a.modificar:hover {
            color: orange !important;
        }

       
    </style>
</head>

<body>

   <div id="contenedor-listado" class="content mt-3" style="width:1000px; margin:auto">

        <div class="card">
             <div class="card-header">
                Listado ventas
                <button id="btn-mostrar-filtros" class="btn btn-sm btn-secondary float-right ml-1">Buscar</button>

                <button id="btn-agregar" class="btn btn-sm btn-secondary float-right ml-1">Agregar</button>
            </div>

            <div id="div-formulario-busqueda" class="card-body d-none">

                <form id="formulario-busqueda" method="post" >
                    <input type="hidden" name="id_persona"  />
                    

                    <div class="form-group row">
                        <label for="nombre" class="col-sm-3 col-form-label">Consultor</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre consultor">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_empresa" class="col-sm-3 col-form-label">Empresa</label>
                        <div class="col-sm-9">
                            <select class="form-control "  name="id_empresa">
                                <option value="">(Seleccionar empresa)</option>
                                <?php
                                $sqle = "SELECT * FROM empresa ORDER BY nombre";
                                $rse = mysqli_query($conexion, $sqle);
                                while ($rwe = mysqli_fetch_assoc($rse)) {

                                    echo "<option value='$rwe[id_empresa]'>$rwe[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                   
                      <div class="form-group row">
                        <label for="fecha_fin" class="col-sm-3 col-form-label">Fecha final<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control"  name="fecha_fin"  >
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






    <!-- Formulario -->

    <div id="contenedor-formulario" class="container mt-5" style="max-width:700px; display:none">
        <div class="card">
           
            <div class="card-header">
                <span id="titulo"><strong>Formulario</strong></span>
            </div>

            <div class="card-body">

                <form id="formulario" method="post" action="?modulo=agregar-producto" autocomplete="off">
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

                                    echo "<option value='$rw1[id_provedore]'>$rw1[nombre]</option>";
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



                    <hr />
                    <div class="form-group row mb-0">
                        <div class="col-sm-12 text-right">
                            <button type="button" id="btn-regresar" class="btn btn-sm btn-light">Regresar</button>
                            <button type="button" id="btn-guardar" class="btn btn-sm btn-secondary">Guardar</button>
                            <button type="button" id="btn-modificar" class="btn btn-sm btn-secondary">Modificar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!-- Fin formulario -->
    <script type="text/javascript">
        $("#btn-agregar").click(function() {
            $("#titulo").html("Agregar producto");
            $("#contenedor-listado").hide();
            $("#contenedor-formulario").show();

            $("#btn-guardar").show();
            $("#btn-modificar").hide();
            $("#formulario")[0].reset(); //limpiar formulario
            $("#formulario input, #formulario select").prop("disabled", false);

        });

     
        $("#btn-guardar").click(function() {
            var parametros = $("#formulario").serialize();
            $.post("?modulo=producto&accion=agregar", parametros, function(respuesta) {
                //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
                var r = jQuery.parseJSON(respuesta);
                alert(r.error);
                if (r.bueno == true) {
                    $("#contenedor-listado").show();
                    $("#contenedor-formulario").hide();

                     cargar_listado();
                }

            });

        });

        $("#btn-modificar").click(function() {
            if (confirm("¿Desea modificar el registro?")) {
                var parametros = $("#formulario").serialize();
                $.post("?modulo=producto&accion=modificar", parametros, function(respuesta) {
                    //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.mensaje);
                    if (r.error == false) {
                        $("#contenedor-listado").show();
                        $("#contenedor-formulario").hide();
                        $("#listado").load("?modulo=producto&accion=listado", parametros);
                        cargar_listado();
                    }
                });
            }
        });

 
        $("#btn-regresar").click(function() {
            $("#contenedor-listado").show();
            $("#contenedor-formulario").hide();

            cargar_listado();
        });

        

        function eliminar(id_producto) {
            if (confirm("¿Realmente desea eliminar el registro?")) {
                var parametros = "id_producto=" + id_producto;
                $.post("?modulo=producto&accion=eliminar", parametros, function(respuesta) {
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.mensaje);
                    if (r.error == false) {
                        cargar_listado();
                    }
                });
            }
        }


       function modificar(id_producto) {
            $("#titulo").html("Modificar producto");
            var parametros = "id_producto=" + id_producto;
            $.get("?modulo=producto&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide();
                $("#contenedor-formulario").show();

                $("#btn-guardar").hide();
                $("#btn-modificar").show();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", false);
                
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

         function mostrar(id_producto) {
            $("#titulo").html("Mostrar persona");
            var parametros = "id_producto=" + id_producto;
            $.get("?modulo=datos-persona", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide();
                $("#contenedor-formulario").show();

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



        $("#btn-mostrar-filtros").click(function() {
            $("#div-formulario-busqueda").toggleClass("d-none");
        });

        $("#btn-buscar").click(function() {
            cargar_listado();
        });

        function cargar_listado() {
            var parametros = $("#formulario-busqueda").serialize() + "&" + 
            $("#formulario-paginacion").serialize();
            $("#listado").load("?modulo=producto&accion=listado", parametros);
        }
      
    </script>
</body>

</html> 