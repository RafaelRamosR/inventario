<?php
require_once("conexion.php");
?>
<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">	
	<script src="js/jquery-3.4.1.min.js"></script>
    <title>Formulario</title>
</head>

<body>

    <div id="contenedor-listado" class="content mt-3" style="width:900px; margin:auto">

        <div class="card">
            
        <div class="card-header">
                Tipo identidad
                <button id="btn-mostrar-filtros" class="btn btn-sm btn-secondary float-right ml-1">Buscar</button>

                <button id="btn-agregar" class="btn btn-sm btn-secondary float-right ml-1">Agregar</button>
            </div>

            
            <div id="div-formulario-busqueda" class="card-body d-none">

                <form id="formulario-busqueda" method="post" action="agregar.php">
                    

                    <div class="form-group row">
                        <label for="tipo_identidad2" class="col-sm-3 col-form-label">Tipo identidad</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tipo_identidad2" placeholder="Tipo identidad">
                        </div>
                    </div>

                    

                    

                    <hr />
                    <div class="form-group row mb-0">
                        <div class="col-sm-12 text-right">
                            <button type="button" id="btn-buscar" class="btn btn-sm btn-secondary">Buscar</button>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-12 text-right">
                            <button type="button" id="btn-limpiar" class="btn btn-sm btn-light">Limpiar</button>
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
                <span id="titulo"><strong>Tipo identidad</strong></span>
            </div>

            <div class="card-body">

                <form id="formulario" method="post" action="agregar.php" autocomplete="off">
                    <h6 class="card-title text-center">Cargo</h6>
              
                    <input type="hidden" name="id_tipo_identidad" id="id_tipo_identidad" />
                    
                   

                    <div class="form-group row">
                        <label for="cargo" class="col-sm-3 col-form-label">Ingrese el tipo de identidad</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tipo_identidad" name="tipo_identidad">
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
            $.post("?modulo=tipo_identidad&accion=agregar", parametros, function(respuesta) {
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
                $.post("?modulo=tipo_identidad&accion=modificar", parametros, function(respuesta) {
                    //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.msg);
                    if (r.error == false) {
                        $("#contenedor-listado").show();
                        $("#contenedor-formulario").hide();
            $("#listado").load("?modulo=tipo_identidad&accion=listado", parametros);
                    }
                });
            }
        });
            

        $("#btn-regresar").click(function() {
            $("#contenedor-listado").show();
            $("#contenedor-formulario").hide();
        });

        function mostrar(id_tipo_identidad) {
            var parametros = "id_tipo_identidad=" + id_tipo_identidad;
            $.get("?modulo=tipo_identidad&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide(); 
                $("#btn-modificar").hide();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", true);

                var r = jQuery.parseJSON(respuesta);

                $("#tipo_identidad").val(r.nombre);
              

            });
        }



        function eliminar(id_tipo_identidad) {
            if (confirm("¿Realmente desea eliminar el registro?")) {
                var parametros = "id_tipo_identidad=" + id_tipo_identidad;
                $.post("?modulo=tipo_identidad&accion=eliminar", parametros, function(respuesta) {
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.msg);
                    if (r.error == false) {
                         cargar_listado()
                    }
                });
            }
        }


        function modificar(id_tipo_identidad) {
            var parametros = "id_tipo_identidad=" + id_tipo_identidad;
            $.get("?modulo=tipo_identidad&accion=datos", parametros, function(respuesta) {
                $("#formulario")[0].reset(); //limpiar formulario
                $("#contenedor-listado").hide(); //ocultar
                $("#contenedor-formulario").show(); //mostrar

                $("#btn-guardar").hide();
                $("#btn-modificar").show();
                $("#formulario")[0].reset(); //limpiar formulario
                $("#formulario input, #formulario select").prop("disabled", false);
                $("#identificacion").prop("disabled", true);


                var r = jQuery.parseJSON(respuesta);

                $("#id_tipo_identidad").val(r.id_tipo_identidad);
                $("#tipo_identidad").val(r.nombre);
                
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
    $("#listado").load("?modulo=tipo_identidad&accion=listado", parametros);
}

    </script>
    <script src="js/all.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>