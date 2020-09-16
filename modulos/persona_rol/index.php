 <style type="text/css">
     .acciones a {
         display: inline-block;
         margin-right: 5px;
         color: gray;
     }

     /*
        .acciones a:hover {
          
            color:red ;
        }
    */

     .acciones a.eliminar {
         color: red !important;
     }

     .acciones a.eliminar:hover {
         color: gray !important;
     }

     .acciones a.modificar:hover {
         color: green !important;
     }

     .acciones a.mostrar:hover {
         color: blue !important;
     }
 </style>

 <div id="contenedor-listado" class="content mt-3" style="max-width:850px; margin:auto">

     <div class="card">
         <div class="card-header">
             <h4>Persona Rol</h4>
             <button id="btn-mostrar-filtros" class="btn btn-sm btn-secondary float-right ml-1">Buscar</button>

             <button id="btn-agregar" class="btn btn-sm btn-secondary float-right ml-1">Agregar</button>
         </div>
         <div id="div-formulario-busqueda" class="card-body d-none">

             <form id="formulario-busqueda">

                <div class="form-group row">
                     <label for="id_persona" class="col-sm-3 col-form-label">Usario</label>
                     <div class="col-sm-9">
                        <select class="form-control"  name="id_persona">
                             <option value="">(Buscar persona Registrado)</option>
                             <?php
                                $sql2 = "SELECT 
                                        pr.id_persona,
                                        CONCAT_WS(' ', u.primer_nombre, u.primer_apellido) AS nombre
                                    FROM persona_rol pr
                                    INNER JOIN persona u ON pr.id_persona = u.id_persona
                                    ORDER BY nombre";
                                $rs2 = mysqli_query($conexion, $sql2);
                            echo mysqli_error($conexion);
                                while ($rw1 = mysqli_fetch_assoc($rs2)) {

                                    echo "<option value='$rw1[id_persona]'>$rw1[nombre]</option>";
                                }
                                ?>
                         </select>
                     </div>
                 </div>

                <div class="form-group row">
                     <label for="rol" class="col-sm-3 col-form-label">Rol</label>
                     <div class="col-sm-9">
                        <select class="form-control"  name="rol">
                             <option value="">(Buscar rol)</option>
                             <?php
                                $sql2 = "SELECT * FROM
                                        rol
                                    ORDER BY nombre";
                                $rs2 = mysqli_query($conexion, $sql2);
                                while ($rw1 = mysqli_fetch_assoc($rs2)) {
                                    echo "<option value='$rw1[id_rol]'>$rw1[nombre]</option>";
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
             <form id="formulario">
                 <input type="hidden" name="id_persona_rol" id="id_persona_rol" />


                    <div class="form-group row">
                     <label for="id_persona" class="col-sm-3 col-form-label">Usario</label>
                     <div class="col-sm-9">
                        <select class="form-control"  id="id_persona" name="id_persona">

                             <option value="">(Buscar Usuario Registrado)</option>
                             <?php
                                $sql2 = "SELECT 
                                        u.id_persona,
                                        CONCAT_WS('  ', u.primer_nombre, u.primer_apellido ) AS nombre
                                       
                                    FROM
                                        persona u
                                          

                                    ORDER BY nombre";
                                $rs2 = mysqli_query($conexion, $sql2);
                                while ($rw1 = mysqli_fetch_assoc($rs2)) {

                                    echo "<option value='$rw1[id_persona]'>$rw1[nombre]</option>";
                                }
                                ?>
                         </select>
                     </div>
                 </div>







                    <div class="form-group row">
                     <label for="id_rol" class="col-sm-3 col-form-label">Rol</label>
                     <div class="col-sm-9">
                        <select class="form-control" id="id_rol" name="id_rol">

                             <option value="">(Buscar Permisos Registrado)</option>
                             <?php
                                $sql2 = "SELECT 
                                        p.id_rol,
                                        CONCAT_WS('  ', p.nombre) AS nombre
                                       
                                    FROM
                                        rol p
                                          

                                    ORDER BY nombre";
                                $rs2 = mysqli_query($conexion, $sql2);
                                while ($rw1 = mysqli_fetch_assoc($rs2)) {

                                    echo "<option value='$rw1[id_rol]'>$rw1[nombre]</option>";
                                }
                                ?>
                         </select>
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
         $.post("?modulo=persona_rol&accion=agregar", parametros, function(respuesta) {
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
             $.post("?modulo=persona_rol&accion=modificar", parametros, function(respuesta) {
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

     function mostrar(id_persona_rol) {
         $("#titulo").html("Mostrar Permisos");
         var parametros = "id_persona_rol=" + id_persona_rol;
         $.get("?modulo=persona_rol&accion=datos", parametros, function(respuesta) {
             $("#formulario")[0].reset(); //limpiar formulario
             $("#contenedor-listado").hide();
             $("#contenedor-formulario").show();

             $("#btn-guardar").hide();
             $("#btn-modificar").hide();

             $("#formulario")[0].reset(); //limpiar formulario
             $("#formulario input, #formulario select").prop("disabled", true);

             var r = jQuery.parseJSON(respuesta);

             $("#id_persona_rol").val(r.id_persona_rol);
             $("#id_persona").val(r.id_persona);
             $("#id_rol").val(r.id_rol);
       
             

         });
     }


     function eliminar(id_persona_rol) {
         if (confirm("¿Realmente desea eliminar el registro?")) {
             var parametros = "id_persona_rol=" + id_persona_rol;
             $.post("?modulo=persona_rol&accion=eliminar", parametros, function(respuesta) {
                 var r = jQuery.parseJSON(respuesta);
                 alert(r.mensaje);
                 if (r.error == false) {
                     cargar_listado();
                 }
             });
         }
     }





     function modificar(id_persona_rol) {
         $("#titulo").html("Modificar Permisos");
         var parametros = "id_persona_rol=" + id_persona_rol;
         $.get("?modulo=persona_rol&accion=datos", parametros, function(respuesta) {
             $("#formulario")[0].reset(); //limpiar formulario
             $("#contenedor-listado").hide();
             $("#contenedor-formulario").show();

             $("#btn-guardar").hide();
             $("#btn-modificar").show();
             $("#formulario")[0].reset(); //limpiar formulario
             $("#formulario input, #formulario select").prop("disabled", false);
        
             var r = jQuery.parseJSON(respuesta);

            $("#id_persona_rol").val(r.id_persona_rol);
             $("#id_persona").val(r.id_persona);
             $("#id_rol").val(r.id_rol);
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
         $("#listado").load("?modulo=persona_rol&accion=listar", parametros);
     }
 </script>