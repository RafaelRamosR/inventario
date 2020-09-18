  <div class="container">
      <div id="div-tabla">
          <div class="row">
              <div class="col-12">
                  <h2 class="float-left">Registro de personas</h2>
                  <div>
                      <button id="btn-buscar" class="btn btn-sm btn-primary ml-1 float-right">Buscar</button>

                      <button id="btn-mostrar-formulario-agregar" class="btn btn-sm btn-success float-right">Agregar</button>
                  </div>
              </div>
          </div>

          <div id="listado" style="max-height:500px; overflow-y:auto;">

          </div>
      </div>

      <div id="div-formulario" class="container mt-4" style="max-width:700px; display: none">
          <div class="card">
              <div class="card-header">
                  Agregar persona
              </div>

              <div class="card-body">
                  <form id="formulario" method="post">
                      <input type="hidden" name="persona_id" id="persona_id" />
                      <div class="form-group row">
                          <label for="tipo_identificacion_id" class="col-sm-3 col-form-label">Tipo identificación</label>
                          <div class="col-sm-9">
                              <select class="form-control " id="tipo_identificacion_id" name="tipo_identificacion_id">
                                  <option value="">(Seleccionar tipo de identificación)</option>
                                  <?php
                                    $sql1 = "SELECT * FROM tipo_identificacion ORDER BY nombre";
                                    $rs1 = mysqli_query($conexion, $sql1);
                                    while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                        echo "<option value='$rw1[tipo_identificacion_id]'>$rw1[nombre]</option>";
                                    }
                                    ?>
                              </select>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="identificacion" class="col-sm-3 col-form-label">Identificación</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Número de identificación">
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="apellido" class="col-sm-3 col-form-label">Apellido</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="fecha_nacimiento" class="col-sm-3 col-form-label">Fecha nacimiento</label>
                          <div class="col-sm-9">
                              <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="municipio_id" class="col-sm-3 col-form-label">Municipio nacim</label>
                          <div class="col-sm-9">
                              <select class="form-control " id="municipio_id" name="municipio_id">
                                  <option value="">(Seleccionar municipio de nacimiento)</option>
                                  <?php
                                    $sql2 = "SELECT 
                            m.municipio_id,
                            CONCAT_WS(': ', d.nombre, m.nombre) AS nombre
                        FROM
                            municipio m
                                JOIN
                            departamento d ON m.departamento_id = d.departamento_id
                        ORDER BY nombre";
                                    $rs2 = mysqli_query($conexion, $sql2);
                                    while ($rw1 = mysqli_fetch_assoc($rs2)) {

                                        echo "<option value='$rw1[municipio_id]'>$rw1[nombre]</option>";
                                    }
                                    ?>
                              </select>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="telefono" class="col-sm-3 col-form-label">Telefono</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
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
          $("#listado").load("?modulo=persona&accion=listar", parametros);
      }

      function modificar(id) {
          $("#div-tabla").hide();
          $("#div-formulario").show();
          $("#btn-agregar").hide();
          $("#btn-modificar").show();

          //Limpiar el formulario
          $("#formulario").trigger("reset");

          var p = "id=" + id;
          $.get("?modulo=persona&accion=asignar", p, function(respuesta) {
              var r = jQuery.parseJSON(respuesta);
              $("#persona_id").val(r.persona_id);
              $("#tipo_identificacion_id").val(r.tipo_identificacion_id);
              $("#identificacion").val(r.identificacion);
              $("#nombre").val(r.nombre);
              $("#apellido").val(r.apellido);
              $("#fecha_nacimiento").val(r.fecha_nacimiento);
              $("#municipio_id").val(r.municipio_id);
              $("#telefono").val(r.telefono);
          });
      }

      function eliminar(id) {

          if (confirm("¿Desea eliminar el registro?")) {
              var p = "persona_id=" + id;
              $.post("?modulo=persona&accion=eliminar", p, function(respuesta) {

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
          $.post("?modulo=persona&accion=agregar", parametros, function(respuesta) {
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
              $.post("?modulo=persona&accion=modificar", parametros, function(respuesta) {
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