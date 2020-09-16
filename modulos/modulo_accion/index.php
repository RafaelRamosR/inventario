 <div id="contenedor-listado" class="content mt-3" style="max-width:680px; margin:auto">

     <div class="card">
         <div class="card-header">
             <h4> Modulo Accion</h4>
             <button id="btn-mostrar-filtros" class="btn btn-sm btn-secondary float-right ml-1">Buscar</button>

             <button id="btn-agregar" class="btn btn-sm btn-secondary float-right ml-1">Agregar</button>
         </div>
         <div id="div-formulario-busqueda" class="card-body d-none">

             <form id="formulario-busqueda">
                 
                 <div class="form-group row">
                     <label for="buscar_modulo" class="col-sm-3 col-form-label">Modulo</label>
                     <div class="col-sm-9">
                        <select class="form-control"  name="buscar_modulo">
                             <option value="">(Buscar modulo)</option>
                             <?php
                                $sql2 = "SELECT * FROM modulo_accion
                                    GROUP BY modulo";
                                $rs2 = mysqli_query($conexion, $sql2);
                                while ($rw1 = mysqli_fetch_assoc($rs2)) {
                                    echo "<option value='$rw1[modulo]'>$rw1[modulo]</option>";
                                }
                                ?>
                         </select>
                     </div>
                 </div>
                 
                 <div class="form-group row">
                     <label for="buscar_accion" class="col-sm-3 col-form-label">Acción</label>
                     <div class="col-sm-9">
                        <select class="form-control"  name="buscar_accion">
                             <option value="">(Buscar acción)</option>
                             <?php
                                $sql2 = "SELECT * FROM modulo_accion
                                    GROUP BY accion";
                                $rs2 = mysqli_query($conexion, $sql2);
                                while ($rw1 = mysqli_fetch_assoc($rs2)) {
                                    echo "<option value='$rw1[accion]'>$rw1[accion]</option>";
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


 <!-- Formulario -->

 <div id="contenedor-formulario" class="content mt-3" style="width:700px; margin:auto; display:none">

     <div class="card">
         <div class="card-header">
             <h4 id="titulo"> Añadir Permisos </h4>
         </div>

         <div class="card-body">
             <form id="formulario" method="post" action="guardar.php">
                 <input type="hidden" name="id_modulo_accion" id="id_modulo_accion" />

                            <div class="form-group row">
                     <label for="modulo" class="col-sm-3 col-form-label">Modulo</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" id="modulo" name="modulo" placeholder="Nombre de modulo">
                     </div>
                 </div>

             <div class="form-group row">
                     <label for="accion" class="col-sm-3 col-form-label">Accion</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control"  id="accion" name="accion" placeholder="Nombre de accion">
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
         $("#titulo").html("Añadir Permisos");
         $("#contenedor-listado").hide();
         $("#contenedor-formulario").show();

         $("#btn-guardar").show();
         $("#btn-modificar").hide();
         $("#formulario")[0].reset(); //limpiar formulario
         $("#formulario input, #formulario select").prop("disabled", false);
     });

     $("#btn-guardar").click(function() {
         var parametros = $("#formulario").serialize();
         $.post("?modulo=modulo_accion&accion=agregar", parametros, function(respuesta) {
             //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
             var r = jQuery.parseJSON(respuesta);
             alert(r.mensaje);
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
             $.post("?modulo=modulo_accion&accion=modificar", parametros, function(respuesta) {
                 //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
                 var r = jQuery.parseJSON(respuesta);
                 alert(r.mensaje);
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

     function mostrar(id_modulo_accion) {
         $("#titulo").html("Mostrar Permisos");
         var parametros = "id_modulo_accion=" + id_modulo_accion;
         $.get("?modulo=modulo_accion&accion=datos", parametros, function(respuesta) {
             $("#formulario")[0].reset(); //limpiar formulario
             $("#contenedor-listado").hide();
             $("#contenedor-formulario").show();

             $("#btn-guardar").hide();
             $("#btn-modificar").hide();

             $("#formulario")[0].reset(); //limpiar formulario
             $("#formulario input, #formulario select").prop("disabled", true);

             var r = jQuery.parseJSON(respuesta);

             $("#id_modulo_accion").val(r.id_modulo_accion);
             $("#modulo").val(r.modulo);
             $("#accion").val(r.accion);
         });
     }

     function eliminar(id_modulo_accion) {
         if (confirm("¿Realmente desea eliminar el registro?")) {
             var parametros = "id_modulo_accion=" + id_modulo_accion;
             $.post("?modulo=modulo_accion&accion=eliminar", parametros, function(respuesta) {
                 var r = jQuery.parseJSON(respuesta);
                 alert(r.mensaje);
                 if (r.error == false) {
                     cargar_listado();
                 }
             });
         }
     }

     function modificar(id_modulo_accion) {
         $("#titulo").html("Modificar Permisos");
         var parametros = "id_modulo_accion=" + id_modulo_accion;
         $.get("?modulo=modulo_accion&accion=datos", parametros, function(respuesta) {
             $("#formulario")[0].reset(); //limpiar formulario
             $("#contenedor-listado").hide();
             $("#contenedor-formulario").show();

             $("#btn-guardar").hide();
             $("#btn-modificar").show();
             $("#formulario")[0].reset(); //limpiar formulario
             $("#formulario input, #formulario select").prop("disabled", false);
        
             var r = jQuery.parseJSON(respuesta);

            $("#id_modulo_accion").val(r.id_modulo_accion);
             $("#modulo").val(r.modulo);
             $("#accion").val(r.accion);
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
$("#listado").load("?modulo=modulo_accion&accion=listar", parametros);
     }
 </script>