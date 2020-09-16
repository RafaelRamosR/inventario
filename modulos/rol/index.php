<?php
require_once("conexion.php");
?>
 <div id="contenedor-listado" class="content mt-3" style="max-width:680px; margin:auto">

     <div class="card">
         <div class="card-header">
             <h4>Rol</h4>
             <button id="btn-mostrar-filtros" class="btn btn-sm btn-secondary float-right ml-1">Buscar</button>

             <button id="btn-agregar" class="btn btn-sm btn-secondary float-right ml-1">Agregar</button>
         </div>
         <div id="div-formulario-busqueda" class="card-body d-none">

             <form id="formulario-busqueda">
                <div class="form-group row">
                     <label for="rol" class="col-sm-3 col-form-label">Rol</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" name="rol" placeholder="Rol">
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

 <div id="contenedor-formulario" class="content mt-3" style="width:700px; margin:auto; display:none">

     <div class="card">
         <div class="card-header">
             <h4 id="titulo"> Añadir Rol </h4>
         </div>

         <div class="card-body">
             <form id="formulario" method="post" action="guardar.php">
                 <input type="hidden" name="id_rol" id="id_rol" />

                            <div class="form-group row">
                     <label for="nombre" class="col-sm-3 col-form-label">Nombre del Rol</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                     </div>
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
 <br>    <br>  







 </div>
 <!-- Fin formulario -->
 <script type="text/javascript">
     $("#btn-agregar").click(function() {
         $("#titulo").html("Añadir Rol");
         $("#contenedor-listado").hide();
         $("#contenedor-formulario").show();

         $("#btn-guardar").show();
         $("#btn-modificar").hide();
         $("#formulario")[0].reset(); //limpiar formulario
         $("#formulario input, #formulario select").prop("disabled", false);
     });

     $("#btn-guardar").click(function() {
         var parametros = $("#formulario").serialize();
         $.post("?modulo=rol&accion=agregar", parametros, function(respuesta) {
             //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
             var r = jQuery.parseJSON(respuesta);
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
             $.post("?modulo=rol&accion=modificar", parametros, function(respuesta) {
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

     function mostrar(id_rol) {
         $("#titulo").html("Mostrar rol");
         var parametros = "id_rol=" + id_rol;
         $.get("?modulo=rol&accion=datos", parametros, function(respuesta) {
             $("#formulario")[0].reset(); //limpiar formulario
             $("#contenedor-listado").hide();
             $("#contenedor-formulario").show();

             $("#btn-guardar").hide();
             $("#btn-modificar").hide();

             $("#formulario")[0].reset(); //limpiar formulario
             $("#formulario input, #formulario select").prop("disabled", true);

             var r = jQuery.parseJSON(respuesta);

             $("#id_rol").val(r.id_rol);
             $("#nombre").val(r.nombre);
         });
     }

     function eliminar(id_rol) {
         if (confirm("¿Realmente desea eliminar el registro?")) {
             var parametros = "id_rol=" + id_rol;
             $.post("?modulo=rol&accion=eliminar", parametros, function(respuesta) {
                 var r = jQuery.parseJSON(respuesta);
                 alert(r.msg);
                 if (r.error == false) {
                     cargar_listado();
                 }
             });
         }
     }

     function modificar(id_rol) {
         $("#titulo").html("Modificar rol");
         var parametros = "id_rol=" + id_rol;
         $.get("?modulo=rol&accion=datos", parametros, function(respuesta) {
             $("#formulario")[0].reset(); //limpiar formulario
             $("#contenedor-listado").hide();
             $("#contenedor-formulario").show();

             $("#btn-guardar").hide();
             $("#btn-modificar").show();
             $("#formulario")[0].reset(); //limpiar formulario
             $("#formulario input, #formulario select").prop("disabled", false);
        
             var r = jQuery.parseJSON(respuesta);

            $("#id_rol").val(r.id_rol);
             $("#nombre").val(r.nombre);
         });
     }

     $("#btn-mostrar-filtros").click(function() {
         $("#div-formulario-busqueda").toggleClass("d-none");
     });

     $("#btn-buscar").click(function() {
         $("#pagina_actual").val("1");
         cargar_listado();
     });

     function cargar_listado() {
         var parametros = $("#formulario-busqueda").serialize() + "&" +
             $("#formulario-paginacion").serialize();
         $("#listado").load("?modulo=rol&accion=listar", parametros);
     }
 </script>