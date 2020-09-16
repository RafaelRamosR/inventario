    <?php
require_once("conexion.php");
$sql = "SELECT      
                    p.id_persona,
                    p.Num_Identificacion,
                    p.primer_nombre,
                    p.segundo_nombre,
                    p.primer_apellido,
                    p.segundo_apellido,
                    p.fecha_nacimiento,
                    p.direccion,
                    p.correo_principal,
                    p.correo_alternativo,
                    t.nombre AS nombre_identidad,
                    s.nombre AS nombre_sexo,
                    e.nombre AS nombre_estado,
                    z.nombre AS nombre_residencia,
                    c.nombre AS nombre_cargo,
                    p.telefono_principal,
                    p.telefono_alternativo,
                    p.id_municipio_expedicion,
                    p.id_municipio_de_nacimiento,
                    p.id_municipio_de_residencia,
                    m1.nombre AS expedicion,
                    m2.nombre AS nacimiento,
                    m3.nombre AS residencia,
                    p.fecha_expedicion,
                    p.id_tipo_de_identificacion,
                    p.id_sexo,
                    p.id_estado_civil,
                    p.id_zona_residencia,
                    p.id_cargo

                FROM
                    persona p
                        INNER JOIN
                    municipio m1 ON p.id_municipio_expedicion = m1.id
                        INNER JOIN
                    municipio m2 ON p.id_municipio_de_nacimiento = m2.id
                        INNER JOIN
                    municipio m3 ON p.id_municipio_de_residencia = m3.id
                        INNER JOIN
                    tipo_identidad t ON p.id_tipo_de_identificacion = t.id_tipo_identidad
                        INNER JOIN
                    sexo s ON p.id_sexo = s.id_sexo
                        INNER JOIN
                    estado_civil e ON p.id_estado_civil = e.id_estado_civil
                        INNER JOIN
                    zona_de_residencia z ON p.id_zona_residencia = z.id_zona_de_residencia
                        INNER JOIN
                    cargo c ON p.id_cargo = c.id_cargo
                    
                WHERE id_persona = '$_SESSION[id_persona]'
                        ";

        $rs = mysqli_query($conexion, $sql);
        echo mysqli_error($conexion);
         $row = mysqli_fetch_assoc($rs);
    ?>
    <div id="contenedor-formulario" class="container mt-5" style="max-width:700px; ">
        <div class="card">
           
            <div class="card-header">
                <span id="titulo"><strong>Formulario</strong></span>
            </div>

            <div class="card-body">

                <form id="formulario" autocomplete="off">
                    <h6 class="card-title text-center">DOCUMENTO DE IDENTIDAD</h6>
              
                <input type="hidden" name="id_persona" id="id_persona" value="<?php echo $row['id_persona'] ?>"/>
                    
                    <div class="form-group row">
                        <label for="id_tipo_de_identificacion" class="col-sm-3 col-form-label">Tipo identificación</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="id_tipo_de_identificacion" name="tipo_de_identificacion">
                                <option value="<?php echo $row['id_tipo_de_identificacion'] ?>"><?php echo $row['nombre_identidad'] ?></option>
                                <?php
                                $sql1 = "SELECT * FROM tipo_identidad ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_tipo_identidad]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Sexo" class="col-sm-3 col-form-label">Sexo</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="sexo" name="sexo">
                                <option value="<?php echo $row['id_sexo'] ?>"><?php echo $row['nombre_sexo'] ?></option>
                                <?php
                                $sql1 = "SELECT * FROM sexo ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_sexo]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="municipio_expedicion" class="col-sm-3 col-form-label">Municipio de expedición</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="municipio_expedicion" name="municipio_expedicion">
                                <option value="<?php echo $row['id_municipio_expedicion'] ?>"><?php echo $row['expedicion'] ?></option>
                                <?php
                                $sql1 = "SELECT * FROM municipio ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div><hr />

                    <div class="form-group row">
                        <label for="municipio_nacimiento" class="col-sm-3 col-form-label">Municipio de nacimiento</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="municipio_nacimiento" name="municipio_nacimiento">
                                <option value="<?php echo $row['id_municipio_de_nacimiento'] ?>"><?php echo $row['nacimiento'] ?></option>
                                <?php
                               $sql1 = "SELECT * FROM municipio ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="estado_civil" class="col-sm-3 col-form-label">Estado civil</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="estado_civil" name="estado_civil">
                                <option value="<?php echo $row['id_estado_civil'] ?>"><?php echo $row['nombre_estado'] ?></option>
                                <?php
                                $sql1 = "SELECT * FROM estado_civil ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_estado_civil]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="municipio_residencia" class="col-sm-3 col-form-label">Municipio de residencia</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="municipio_residencia" name="municipio_residencia">
                                <option value="<?php echo $row['id_zona_residencia'] ?>"><?php echo $row['residencia'] ?></option>
                                <?php
                                $sql1 = "SELECT * FROM municipio ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="zona_residencia" class="col-sm-3 col-form-label">Zona de residencia</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="zona_residencia" name="zona_residencia">
                                <option value="<?php echo $row['id_zona_residencia'] ?>"><?php echo $row['nombre_residencia'] ?></option>
                                <?php
                                $sql1 = "SELECT * FROM zona_de_residencia ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_zona_de_residencia]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="numero_identificacion" class="col-sm-3 col-form-label">Número de identificación</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion"  value="<?php echo $row['Num_Identificacion'] ?>">
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label for="fecha_expedicion" class="col-sm-3 col-form-label">Fecha de expedición</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha_expedicion" name="fecha_expedicion" value="<?php echo $row['fecha_expedicion'] ?>">
                        </div>
                    </div>
                    
                    
 
                   
                    <h6 class="card-title text-center">INFORMACIÓN PERSONAL</h6>
                    <div class="form-group row">
                        <label for="primer_nombre" class="col-sm-3 col-form-label">Primer nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="primer_nombre" name="primer_nombre"  value="<?php echo $row['primer_nombre'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="segundo_nombre" class="col-sm-3 col-form-label">Segundo nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre"  value="<?php echo $row['segundo_nombre'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="primer_apellido" class="col-sm-3 col-form-label">Primer apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido"  value="<?php echo $row['primer_apellido'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="segundo_apellido" class="col-sm-3 col-form-label">Segundo apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido"  value="<?php echo $row['segundo_apellido'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="fecha_nacimiento" class="col-sm-3 col-form-label">Fecha nacimiento</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="Direccion" class="col-sm-3 col-form-label">Dirección</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="direccion" name="direccion"  value="<?php echo $row['direccion'] ?>">
                        </div>
                    </div><hr />                  


                    <h6 class="card-title text-center">INFORMACIÓN DE CONTACTO</h6>
                    <div class="form-group row">
                        <label for="correo_principal" class="col-sm-3 col-form-label">Correo principal</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="correo_principal" name="correo_principal"  value="<?php echo $row['correo_principal'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="correo_alternativo" class="col-sm-3 col-form-label">Correo alternativo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="correo_alternativo" name="correo_alternativo"  value="<?php echo $row['correo_alternativo'] ?>">
                        </div>
                    </div>
            
                    
                    <div class="form-group row">
                        <label for="telefono_principal" class="col-sm-3 col-form-label">Teléfono principal</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telefono_principal" name="telefono_principal"  value="<?php echo $row['telefono_principal'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefono_alternativo" class="col-sm-3 col-form-label">Teléfono alternativo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="telefono_alternativo" name="telefono_alternativo"  value="<?php echo $row['telefono_alternativo'] ?>">
                        </div>
                    </div><hr />

                        <div class="col-sm-9">
                           <label for="cargo" class="col-sm-3 col-form-label">Cargo</label>
                           <div class="col-sm-9">
                            <select class="form-control " id="cargo" name="cargo">
                                <option value="<?php echo $row['id_cargo'] ?>"><?php echo $row['nombre_cargo'] ?></option>
                                <?php
                                $sql1 = "SELECT * FROM cargo ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[id_cargo]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    </form>
            </div>
            
            
            
    <!-- LISTA DE BOTONES CON EVENTOS -->        
            <div class="card-footer text-right">
                
                <button type="button" id="btn-modificar" class="btn btn-sm btn-secondary">Modificar</button>
            </div>
            
<!-- FIN DEL FORMULARIO -->
        </div>
        
    </div>
    <br><br><br><br><br>
        <script type="text/javascript">

        $("#btn-modificar").click(function() {
            if (confirm("¿Desea modificar el registro?")) {
                var parametros = $("#formulario").serialize();
                $.post("?modulo=datos_personales&accion=modificar", parametros, function(respuesta) {
                    //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
                    var r = jQuery.parseJSON(respuesta);
                    alert(r.msg);
                    if (r.error == false) {
                        window.location.replace("?modulo=inicio&accion=ver");
                    }
                });
            }
        });

    </script>