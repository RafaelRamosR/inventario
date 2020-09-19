 <script src="js/tinymce/tinymce.min.js"></script>
 <div class="container">
     <div id="div-tabla" class="card">
         <div class="card-header">
             <div class="col-12">
                 <h2 class="float-left">Registro de contenidos</h2>
                 <div>
                     <button id="btn-buscar" class="btn btn-sm btn-primary ml-1 float-right">Buscar</button>
                     <button id="btn-mostrar-formulario-agregar" class="btn btn-sm btn-success float-right">Agregar</button>
                 </div>
             </div>
         </div>
         <div id="listado" style="max-height: 500px; overflow-y:auto;"></div>
     </div>

     <div id="div-formulario" class="container mt-4" style="  display: none">
         <div class="card">
             <div class="card-header">Agregar contenido</div>
             <div class="card-body">
                 <form id="formulario" method="post">
                     <input type="hidden" name="contenido_id" id="contenido_id" />
                     <div class="form-group row">
                         <label for="titulo" class="col-sm-3 col-form-label">Titulo</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label for="modulo" class="col-sm-3 col-form-label">Modulo</label>
                         <div class="col-sm-9">
                             <input type="text" class="form-control" id="modulo" name="modulo" placeholder="Modulo">
                         </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-sm-12">
                             <textarea disabled type="text" class="form-control" id="contenido" name="contenido" placeholder="Contenido" rows="20"></textarea>
                         </div>
                     </div>
                 </form>
                 <hr />

                 <div class="form-group row mb-0">
                     <div id="div-pb" class="col-sm-12 text-center" style="display: none">
                         <img src="img/pb.gif" />
                     </div>

                     <div id="div-btn" class="col-sm-12 text-right">
                         <input type="button" class="btn btn-success" id="btn-agregar" value="Guardar">
                         <input type="button" class="btn btn-success" id="btn-modificar" value="Modificar">
                         <input type="button" class="btn btn-secondary" id="btn-regresar" value="Regresar">
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <script>
     tinymce.init({
         selector: 'textarea'
     });
     var pagina_actual = 1;

     function mover_pagina(pagina) {
         if (pagina < 1) {
             return;
         }
         var cantidad_paginas = parseInt($("#cantidad_paginas").val());
         if (pagina > cantidad_paginas) {
             return;
         }
         pagina_actual = pagina;
         cargar_tabla();
     }

     function cargar_tabla() {
         var parametros = $("#form-filtros").serialize();
         parametros = parametros + "&pagina_actual=" + pagina_actual;
         $("#listado").html('<div class="text-center"><img src="img/pb.gif"/></div>');
         $("#listado").load("?modulo=contenido&accion=listar", parametros);
     }

     function modificar(id) {
         $("#div-tabla").hide();
         $("#div-formulario").show();
         $("#btn-agregar").hide();
         $("#btn-modificar").show();

         //Limpiar el formulario
         $("#formulario").trigger("reset");

         var p = "id=" + id;
         $.get("?modulo=contenido&accion=asignar", p, function(respuesta) {
             var r = jQuery.parseJSON(respuesta);
             $("#contenido_id").val(r.contenido_id);
             $("#modulo").val(r.modulo);
             $("#titulo").val(r.titulo);
             //$("#contenido").val(r.contenido);
             tinyMCE.get('contenido').setContent(r.contenido);
         });
     }


     function eliminar(id) {

         if (confirm("¿Desea eliminar el registro?")) {
             var p = "contenido_id=" + id;
             $.post("?modulo=contenido&accion=eliminar", p, function(respuesta) {

                 try {
                     var r = jQuery.parseJSON(respuesta);


                     if (r.error == true) {
                         $.notify({
                             message: r.msg
                         }, {
                             type: 'danger',
                             delay: 0
                         });
                     } else {
                         cargar_tabla();


                         $.notify({
                             message: r.msg
                         }, {
                             type: 'success',
                             delay: 0
                         });
                     }
                 } catch (error) {
                     $.notify({
                         message: error + "<br/></br>" + respuesta
                     }, {
                         type: 'danger',
                         delay: 0
                     });
                 }
             });
         }
     }



     cargar_tabla();

     $("#btn-mostrar-formulario-agregar").click(function() {
         $("#div-tabla").hide();
         $("#div-formulario").show();

         //Limpiar el formulario
         $("#formulario").trigger("reset");
         $("#btn-agregar").show();
         $("#btn-modificar").hide();

     });

     $("#btn-agregar").click(function() {
         $.notifyClose();
         $("#div-pb").show();
         $("#div-btn").hide();
         var parametros = $("#formulario").serialize();

         var contenido = tinyMCE.get('contenido').getContent();
         parametros = parametros + "&contenido=" + encodeURIComponent(contenido);

         $.post("?modulo=contenido&accion=agregar", parametros, function(respuesta) {
             $("#div-pb").hide();
             $("#div-btn").show();

             try {
                 var r = jQuery.parseJSON(respuesta);


                 if (r.error == true) {
                     $.notify({
                         message: r.msg
                     }, {
                         type: 'danger',
                         delay: 0
                     });
                 } else {
                     cargar_tabla();

                     $("#div-tabla").show();
                     $("#div-formulario").hide();


                     $.notify({
                         message: r.msg
                     }, {
                         type: 'success',
                         delay: 0
                     });
                 }
             } catch (error) {
                 $.notify({
                     message: error + "<br/></br>" + respuesta
                 }, {
                     type: 'danger',
                     delay: 0
                 });
             }


         });

     });


     $("#btn-modificar").click(function() {
         if (confirm("¿Desea modificar el registro?")) {
             $.notifyClose();
             $("#div-pb").show();
             $("#div-btn").hide();
             var parametros = $("#formulario").serialize();
             var contenido = tinyMCE.get('contenido').getContent();
             parametros = parametros + "&contenido=" + encodeURIComponent(contenido);


             $.post("?modulo=contenido&accion=modificar", parametros, function(respuesta) {
                 $("#div-pb").hide();
                 $("#div-btn").show();


                 try {
                     var r = jQuery.parseJSON(respuesta);


                     if (r.error == true) {
                         $.notify({
                             message: r.msg
                         }, {
                             type: 'danger',
                             delay: 0
                         });
                     } else {
                         cargar_tabla();

                         $("#div-tabla").show();
                         $("#div-formulario").hide();


                         $.notify({
                             message: r.msg
                         }, {
                             type: 'success',
                             delay: 0
                         });
                     }
                 } catch (error) {
                     $.notify({
                         message: error + "<br/></br>" + respuesta
                     }, {
                         type: 'danger',
                         delay: 0
                     });
                 }


             });
         }
     });

     $("#btn-regresar").click(function() {
         $("#div-tabla").show();
         $("#div-formulario").hide();
     });

     $("#btn-buscar").click(function() {
         $("#tr-filtros").toggleClass("d-none");
     });
 </script>