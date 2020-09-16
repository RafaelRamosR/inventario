


 <div id="contenedor-listado" class="content mt-3" style="width:1150px; margin:auto">

     <div class="card">
         <div class="card-header">
            <h4>Listado de users </h4>
             <button id="btn-mostrar-filtros" class="btn btn-sm btn-secondary float-right ml-1">Buscar</button>

               <button id="btn-agregar" class="btn btn-sm btn-secondary float-right ml-1">Agregar</button>
            </div>  
               
            </div>

            <div id="div-formulario-busqueda" class="card-body d-none">

                <form id="formulario-busqueda" method="post">
                   
                      
                  

                 <div class="form-group row">
                     <label for="name_user" class="col-sm-3 col-form-label">Nombre</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" name="name_user" >
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
      <br>    <br>   
 </div>





 <!-- Formulario -->

 <div id="contenedor-formulario" class="content mt-3" style="width:950px; margin:auto; display:none">

     <div class="card">
         <div class="card-header">
             <h4 id="titulo">Agregar user</h4>
         </div>

         <div class="card-body">
             <form id="formulario" method="post" action="guardar.php">
                 <input type="hidden" name="id_user" id="id_user"/>


                    <h6 align='center'>INFORMACION DE REGISTRO</h6>
                                        <br>

                  
                                    
                    <div class="form-group row">
                     <label for="fecha_redacion" class="col-sm-3 col-form-label">Fecha Radicacion</label>
                     <div class="col-sm-9">
                         <input type="datetime" class="form-control" id="fecha_radicacion" name="fecha_radicacion" value="<?php echo date('Y-m-d  H:i'); ?>" size="10" readonly />
                     </div>
                 </div>


                 <div class="form-group row">
                     <label for="id_rol" class="col-sm-3 col-form-label input-group-text">Tipo Registro</label>
                     <div class="col-sm-9">
                        <select class="form-control" id="id_rol" name="id_rol">

                             <option value="">(Selecionar el registro deseado Registrado)</option>
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
                


<!-- INICIO DEL CONTENEDOR FORMULARIO ADMO -->

<div id="formuario-admin" class="content mt-3" style="width:700px; margin:auto; display:none" >
                 <h6 align='center'>INFORMACION PERSONAL ADMIN</h6>
                                 <br>
        <div class="form-group row">
            <label for="tipo_identificacion_id" class="col-sm-3 col-form-label"><span class="required">*</span>Tipo identificación</label>
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



                        <td></td>


                     <div class="form-group row">
                        <label for="name_user" class="col-sm-3 col-form-label"><span class="required">*</span>Primer Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name_user" name="name_user" placeholder="Ingre su primer nombre"> 
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="last_name_user" class="col-sm-3 col-form-label"><span class="required">*</span>Primer Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="last_name_user" name="last_name_user" placeholder="Ingrese su Primer Apellido">
                        </div>
                    </div>

              
            

                  <div class="form-group row">
                        <label for="sexo_id" class="col-sm-3 col-form-label"><span class="required">*</span>Sexo</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="sexo_id" name="sexo_id">
                                <option value="">(Seleccionar su genero)</option>
                                <?php
                                $sql1 = "SELECT * FROM sexo ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[sexo_id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

 




                     <div class="form-group row">
                        <label for="direccion" class="col-sm-3 col-form-label"><span class="required">*</span>Direccion</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su Direccion" required>
                        </div>
                    </div>



                 <div class="form-group row">
                     <label for="phone_user" class="col-sm-3 col-form-label">phone_user</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" id="phone_user" name="phone_user" placeholder="phone_user">
                     </div>
                 </div>



                    <div class="form-group row">
                        <label for="mail_user" class="col-sm-3 col-form-label"><span class="required">*</span>mail_user</label>
                        <div class="col-sm-9">
                            <input type="emails" class="form-control" id="mail_user" name="mail_user" placeholder="Ingrese su mail_user" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="phone_user" class="col-sm-3 col-form-label"><span class="required">*</span>Contresaña</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="phone_user" name="phone_user" placeholder="Ingrese su contraseña" required>
                        </div>
                    </div>

          </div>  

<!-- FIN DEL CONTENEDOR FORMULARIO ADMO -->

<!-- INICIO DEL CONTENEDOR FORMULARIO AFILICION -->

<div id="formuario-afiliacion" class="content mt-3" style="width:700px; margin:auto; display:none" >                 <h6 align='center'>INFORMACION AFILIACION</h6>
                      <hr>

                 <div class="form-group row">
                        <label for="tipo_afiliacion" class="col-sm-3 col-form-label">Afilacion</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="tipo_afiliacion" name="tipo_afiliacion">
                             <option selected>(seleccionar Tipo Afiliacion)</option>
                                <option value="individual">Individual</option>
                                 <option value="colectiva">Colectiva</option>
                                 <option value="institucional">Institucional</option>
                                 <option value="oficio">De Oficio</option>
                                </select>
                        </div>
                    </div>

<!-- INICIO DEL CONTENEDOR FORMULARIO COTIZA -->
<div id="formuario-colectivo" class="content mt-3" style="width:700px; margin:auto; display:none" >

<div> <pregunta-user-afiliado-actualmente><div class="row"> <div class="col-md-6">
 <div class="control-label text-left">¿El user ingresado ha estado o se encuentra actualmente afiliado en alguna EPS?</div> 
</div> 

<div class="col-md-6">
 <div ng-class="{true: 'radio-error'}[errorRequerido]" class="radio-inline ng-isolate-scope radio-error" radio="" field="sAfiliado" model="formAfiliacionNueTras.snafiliado" requerido="true" label="Sí" submitted-form="formAfiliacionNueTras.submitted" value="S" fn-change="mostrarRegimenEPSAnterior()"> 
    <input type="radio" name="sAfiliado" ng-model="model" id="sAfiliadoS" value="S" ng-required="requerido" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" required="required"> 
    <label for="sAfiliadoS" class="ng-binding">Sí</label>
        </div> 
      <div ng-class="{true: 'radio-error'}[errorRequerido]" class="radio-inline ng-isolate-scope radio-error" radio="" field="nAfiliado" model="formAfiliacionNueTras.snafiliado" requerido="true" label="No" submitted-form="formAfiliacionNueTras.submitted" value="N" fn-change="mostrarRegimenEPSAnterior()">
       <input type="radio" name="nAfiliado" ng-model="model" id="nAfiliadoN" value="N" ng-required="requerido" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" required="required"> 
       <label for="nAfiliadoN" class="ng-binding">No</label> 
       
   </div> 
</div> 
</div></pregunta-user-afiliado-actualmente> </div>


<div class="row">
 <div class="col-md-12"> <br> 
    <div class="subTituloPagina">
     <h4><strong>Tipo de cotizante</strong></h4> </div> <p>Tenga en cuenta que el tipo de cotizante que seleccione en esta opción, debe coincidir con el tipo de cotizante que elija al momento de realizar los aportes a través de PILA.</p> <br>
      </div>
       </div>

<div class="row">
 <div class="col-md-4">
  <div class="form-group has-feedback ng-isolate-scope" ng-class="{true: 'has-error'}[errorRequerido]" ng-hide="esconder" field="selectTipoCotizanteGeneral" model="formAfiliacionNueTras.tipoCotizanteGeneral" requerido="true" datos="listaTiposCotizantesGeneral" label="Elija condición de la persona a ingresar" submitted-form="formAfiliacionNueTras.submitted" seleccione="Seleccione" fn-change="obtenerTipoCotizanteGeneral()"> 
    <label name="" id="" class="control-label ng-binding">
        <span class="campoObligatorio" ng-show="requerido">*</span> Elija condición de la persona a ingresar</label> 

        <select name="selectTipoCotizanteGeneral" id="selectTipoCotizanteGeneral" class="form-control input-blue estilo-lista ng-not-empty ng-dirty ng-valid-parse ng-valid ng-valid-required ng-touched" ng-model="model" ng-options="option.text for option in datos" ng-required="requerido" ng-disabled="deshabilitado" required="required">
            <option value="" class="ng-binding">Seleccione</option>
            <option label="Empleado" value="object:245">Empleado</option>
            <option label="Independiente " value="object:246">Independiente </option>
            <option label="Pensionado" value="object:247">Pensionado</option>
        </select> 
        <span class="glyphicon form-control-feedback ng-hide" ng-show="errorRequerido">
            
           
        </div> 
    </div> 
  
     </div>

<seccion-beneficiarios-formu>
<div class="row">
     <div class="col-md-12">
      <div class="subTituloPagina">
       <h4><strong>Datos beneficiarios</strong></h4> 
    </div> 
            </div> 
        </div> 
        <br> 
<div class="container-fluid bg-info"> <br> 
    <div class="row"> 
        <div class="col-md-8 ng-binding"> Si desea incluir beneficiarios en su proceso de afiliación haga clic en el botón agregar beneficiarios. </div>

 <div class="col-md-4"> 
    <button type="button" class="btn btn-primary btn-large" ng-click="openModalAddBeneficiario()"> Agregar beneficiarios </button>
    </div> 
             </div> 
             <br> 
                    </div>
        <br> 
        <div class="contenedorGridResultados table-responsive ng-hide" ng-show="formAfiliacionNueTras.listaBeneficiarios.length > 0"> 
            <table class="table table-condensed table-striped table-bordered"> <thead> <tr> <th class="table-header">Nombres y apellidos</th> <th class="table-header">Documento</th> <th class="table-header">Parentesco</th> <th class="table-header"></th> </tr> </thead> <tbody> <!-- ngRepeat: beneficiario in formAfiliacionNueTras.listaBeneficiarios --> </tbody> </table> </div></seccion-beneficiarios-formu>
        </div>
<!-- FIN DEL CONTENEDOR FORMULARIO COLECTIVA -->

 <br> 
 <hr>



                 <div class="form-group row">
                        <label for="regimen_id" class="col-sm-3 col-form-label"><span class="required">*</span>Regimen</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="regimen_id" name="regimen_id">
                                <option value="">(Seleccionar Regimen)</option>
                                <?php
                                $sql1 = "SELECT * FROM regimen ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[regimen_id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>



            

             






                             <h6 align='center'>INFORMACION PERSONAL</h6>

                                 <br>



                       <div class="form-group row">
                        <label for="poblacion_id" class="col-sm-3 col-form-label"><span class="required">*</span>Poblacion</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="poblacion_id" name="poblacion_id">
                                <option value="">(Seleccionar su  poblacion)</option>
                                <?php
                                $sql1 = "SELECT * FROM poblacion ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[poblacion_id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>




                 <div class="form-group row">
                     <label for="tipo_identificacion_id" class="col-sm-3 col-form-label"><span class="required">*</span>Tipo identificación</label>
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
                        <label for="municipioexp_id" class="col-sm-3 col-form-label"><span class="required">*</span>Lugar de Expedicion</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="municipioexp_id" name="municipioexp_id">
                                <option value="">(Seleccionar Luagar de expedicion)</option>
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


                        <td></td>




                     <div class="form-group row">
                        <label for="name_user" class="col-sm-3 col-form-label"><span class="required">*</span>Primer Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name_user" name="name_user" placeholder="Ingre su primer nombre"> 
                        </div>
                    </div>


                         <div class="form-group row">
                        <label for="nombre2" class="col-sm-3 col-form-label">Segundo Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Ingre su segundo nombre" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_name_user" class="col-sm-3 col-form-label"><span class="required">*</span>Primer Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="last_name_user" name="last_name_user" placeholder="Ingrese su Primer Apellido">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido2" class="col-sm-3 col-form-label">Segundo Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Ingrese su segudno Apellido">
                        </div>
                    </div>

                 <div class="form-group row">
                     <label for="fecha_nacimiento" class="col-sm-3 col-form-label">Fecha nacimiento</label>
                     <div class="col-sm-9">
                         <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                     </div>
                 </div>

                  <div class="form-group row">
                        <label for="sexo_id" class="col-sm-3 col-form-label"><span class="required">*</span>Sexo</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="sexo_id" name="sexo_id">
                                <option value="">(Seleccionar su genero)</option>
                                <?php
                                $sql1 = "SELECT * FROM sexo ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[sexo_id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                 <div class="form-group row">
                     <label for="municipio_id" class="col-sm-3 col-form-label">Lugar de Nacimeinto</label>
                     <div class="col-sm-9">
                         <select class="form-control " id="municipio_id" name="municipio_id">
                             <option value="">(Seleccionar su lugar de nacimiento)</option>
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
                        <label for="estado_civil_id" class="col-sm-3 col-form-label"><span class="required">*</span>Estado civil</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="estado_civil_id" name="estado_civil_id">
                                <option value="">(Seleccionar su estado civil)</option>
                                <?php
                                $sql1 = "SELECT * FROM estado_civil ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[estado_civil_id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                     <label for="municipiores_id" class="col-sm-3 col-form-label">Lugar de Reisedencia</label>
                     <div class="col-sm-9">
                         <select class="form-control " id="municipiores_id" name="municipiores_id">
                             <option value="">(Seleccionar su lugar de Residencia)</option>
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
                        <label for="direccion" class="col-sm-3 col-form-label"><span class="required">*</span>Direccion</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su Direccion" required>
                        </div>
                    </div>

 <div class="form-group row">
<label for="zona_rural" class="col-sm-3 col-form-label"><span class="required">*</span>Zona Rural</label>
     <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="zona_rural" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Urbana</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="zona_rural" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Rural</label>
</div>

   </div>

                      <div class="form-group row">
                     <label for="phone_user" class="col-sm-3 col-form-label">phone_user</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" id="phone_user" name="phone_user" placeholder="phone_user">
                     </div>
                 </div>



                    <div class="form-group row">
                        <label for="mail_user" class="col-sm-3 col-form-label"><span class="required">*</span>mail_user</label>
                        <div class="col-sm-9">
                            <input type="emails" class="form-control" id="mail_user" name="mail_user" placeholder="Ingrese su mail_user" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="phone_user" class="col-sm-3 col-form-label"><span class="required">*</span>Contresaña</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="phone_user" name="phone_user" placeholder="Ingrese su contraseña" required>
                        </div>
                    </div>



            

                 

      </div>
<!-- FIN DEL CONTENEDOR FORMULARIO AFILICION -->

<!-- INICIO DEL CONTENEDOR FORMULARIO EMPLEADO -->
        
<div id="formuario-empleado"  class="content mt-3" style="width:700px; margin:auto; display:none" >

                    <h6 align='center'>INFORMACION PERSONAL EMPLEADOS DE LA EPS</h6>
                                <br>

                <div class="form-group row">
                <label for="tipo_empleado" class="col-sm-3 col-form-label">Tipo Empleado</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="tipo_empleado" name="tipo_empleado" placeholder="Especifique el tipo de empleado al que pertence" required>
                 </div>
                </div>
                       
               
        <div class="form-group row">
                     <label for="tipo_identificacion_id" class="col-sm-3 col-form-label"><span class="required">*</span>Tipo identificación</label>
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



                        <td></td>




                     <div class="form-group row">
                        <label for="name_user" class="col-sm-3 col-form-label"><span class="required">*</span> Nombre</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name_user" name="name_user" placeholder="Ingre su primer nombre"> 
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="last_name_user" class="col-sm-3 col-form-label"><span class="required">*</span>Apellido</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="last_name_user" name="last_name_user" placeholder="Ingrese su Primer Apellido">
                        </div>
                    </div>

              
            

                       <div class="form-group row">
                        <label for="estado_civil_id" class="col-sm-3 col-form-label"><span class="required">*</span>Estado civil</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="estado_civil_id" name="estado_civil_id">
                                <option value="">(Seleccionar su estado civil)</option>
                                <?php
                                $sql1 = "SELECT * FROM estado_civil ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[estado_civil_id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                     <label for="municipiores_id" class="col-sm-3 col-form-label">Lugar de Reisedencia</label>
                     <div class="col-sm-9">
                         <select class="form-control " id="municipiores_id" name="municipiores_id">
                             <option value="">(Seleccionar su lugar de Residencia)</option>
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
                        <label for="sexo_id" class="col-sm-3 col-form-label"><span class="required">*</span>Sexo</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="sexo_id" name="sexo_id">
                                <option value="">(Seleccionar su genero)</option>
                                <?php
                                $sql1 = "SELECT * FROM sexo ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[sexo_id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

 


                <div class="form-group row">
                     <label for="fecha_nacimiento" class="col-sm-3 col-form-label">Fecha nacimiento</label>
                     <div class="col-sm-9">
                         <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                     </div>
                 </div>

                  <div class="form-group row">
                        <label for="sexo_id" class="col-sm-3 col-form-label"><span class="required">*</span>Sexo</label>
                        <div class="col-sm-9">
                            <select class="form-control " id="sexo_id" name="sexo_id">
                                <option value="">(Seleccionar su genero)</option>
                                <?php
                                $sql1 = "SELECT * FROM sexo ORDER BY nombre";
                                $rs1 = mysqli_query($conexion, $sql1);
                                while ($rw1 = mysqli_fetch_assoc($rs1)) {

                                    echo "<option value='$rw1[sexo_id]'>$rw1[nombre]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                 <div class="form-group row">
                     <label for="municipio_id" class="col-sm-3 col-form-label">Lugar de Nacimeinto</label>
                     <div class="col-sm-9">
                         <select class="form-control " id="municipio_id" name="municipio_id">
                             <option value="">(Seleccionar su lugar de nacimiento)</option>
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
                        <label for="direccion" class="col-sm-3 col-form-label"><span class="required">*</span>Direccion</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su Direccion" required>
                        </div>
                    </div>



                      <div class="form-group row">
                     <label for="phone_user" class="col-sm-3 col-form-label">phone_user</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" id="phone_user" name="phone_user" placeholder="phone_user">
                     </div>
                 </div>



                    <div class="form-group row">
                        <label for="mail_user" class="col-sm-3 col-form-label"><span class="required">*</span>mail_user</label>
                        <div class="col-sm-9">
                            <input type="emails" class="form-control" id="mail_user" name="mail_user" placeholder="Ingrese su mail_user" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="phone_user" class="col-sm-3 col-form-label"><span class="required">*</span>Contresaña</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="phone_user" name="phone_user" placeholder="Ingrese su contraseña" required>
                        </div>
                    </div>

          </div>  

<!-- FIN DEL CONTENEDOR FORMULARIO EMPLEADOS -->


           </div>
 
    
    <br> 

   

      <div class="modal-footer">
        <button type="button" id="btn-regresar" class="btn btn-sm btn-light">Regresar</button> 

        <input type="button"  id="btn-guardar" value="Guardar"  class="btn btn-primary">

     <button type="button" id="btn-modificar" class="btn btn-sm btn-secondary">Modificar</button>
        </div>

  <div class="form-group row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
      <p class="reg">AUTORIZO de manera previa, expresa, informada y explícita, a Comfachoco para el uso y tratamiento de mis datos. (ver documento tratamiento datos personales).   <br>¿Ya tienes una cuenta?<a class="link" href="?modulo=iniciar-sesion&accion=ver">Inicia  Sesion</a></p>
        </label>
      </div>
    </div>
  </div>




        <br> 
    
                    </div>   
                                   
                 </div>
             </form>
         </div>
     </div>

    <br>    <br>   
 </div>
 <!-- Fin formulario -->
 <script type="text/javascript">
      $("#btn-plus").click(function() {
            $("#btn-plus").toggleClass("d-none");
            $("#btn-minus").toggleClass("d-none");
            $("#div-formulario-busqueda").toggleClass("d-none");
        });
            
        $("#btn-minus").click(function() {
            $("#btn-plus").toggleClass("d-none");
            $("#btn-minus").toggleClass("d-none");
            $("#div-formulario-busqueda").toggleClass("d-none");
        });

    
    

    $("#btn-agregar").click(function() {
         $("#titulo").html("Agregar user");
         $("#contenedor-listado").hide();
         $("#contenedor-formulario").show();

         $("#btn-guardar").show();
         $("#btn-modificar").hide();
         $("#formulario")[0].reset(); //limpiar formulario
         $("#formulario input, #formulario select").prop("disabled", false);

     });

     $("#btn-guardar").click(function() {
         var parametros = $("#formulario").serialize();
         $.post("?modulo=user&accion=agregar", parametros, function(respuesta) {
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
             $.post("?modulo=user&accion=modificar", parametros, function(respuesta) {
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

     function mostrar(id_user) {
         $("#titulo").html("Mostrar user");
         var parametros = "id_user=" + id_user;
         $.get("?modulo=user&accion=cargar-datos", parametros, function(respuesta) {
             $("#formulario")[0].reset(); //limpiar formulario
             $("#contenedor-listado").hide();
             $("#contenedor-formulario").show();

             $("#btn-guardar").hide();
             $("#btn-modificar").hide();

             $("#formulario")[0].reset(); //limpiar formulario
             $("#formulario input, #formulario select").prop("disabled", true);

             var r = jQuery.parseJSON(respuesta);

            $("#id_user").val(r.id_user);

            $("#fecha_radicacion").val(r.fecha_radicacion);
             $("#tipo_afiliacion").val(r.tipo_afiliacion);
            $("#tipo_tramite_id").val(r.tipo_tramite_id);
            
            $("#tipo_identificacion_id").val(r.tipo_identificacion_id);
            $("#identificacion").val(r.identificacion);
            $("#municipioexp_id").val(r.municipioexp_id);
            $("#name_user").val(r.name_user);
            $("#nombre2").val(r.nombre2);
            $("#last_name_user").val(r.last_name_user);
            $("#apellido2").val(r.apellido2);
            $("#fecha_nacimiento").val(r.fecha_nacimiento);
            $("#sexo_id").val(r.sexo_id);
            $("#municipio_id").val(r.municipio_id);  
            $("#estado_civil_id").val(r.estado_civil_id);
            $("#municipiores_id").val(r.municipiores_id); 
            $("#direccion").val(r.direccion);  
            $("#mail_user").val(r.mail_user);
            $("#regimen_id").val(r.regimen_id);
            $("#poblacion_id").val(r.poblacion_id);
            $("#phone_user").val(r.phone_user);
            $("#phone_user").val(r.phone_user);
              

         });
     }









     function eliminar(id_user) {
         if (confirm("¿Realmente desea eliminar el registro?")) {
             var parametros = "id_user=" + id_user;
             $.post("?modulo=user&accion=eliminar", parametros, function(respuesta) {
                 var r = jQuery.parseJSON(respuesta);
                 alert(r.mensaje);
                 if (r.error == false) {
                     cargar_listado();
                 }
             });
         }
     }


     function modificar(id_user) {
         $("#titulo").html("Modificar user");
         var parametros = "id_user=" + id_user;
         $.get("?modulo=user&accion=cargar-datos", parametros, function(respuesta) {
             $("#formulario")[0].reset(); //limpiar formulario
             $("#contenedor-listado").hide();
             $("#contenedor-formulario").show();

             $("#btn-guardar").hide();
             $("#btn-modificar").show();
             $("#formulario")[0].reset(); //limpiar formulario
             $("#formulario input, #formulario select").prop("disabled", false);
             $("#identificacion").prop("disabled", true);
             $("#fecha_radicacion").prop("disabled", true);
             $("#tipo_afiliacion").prop("disabled", true);
            $("#tipo_tramite_id").prop("disabled", true);
            $("#tipo_identificacion_id").prop("disabled", true);
            $("#identificacion").prop("disabled", true);
          
        

             var r = jQuery.parseJSON(respuesta);

             $("#id_user").val(r.id_user);
            $("#fecha_radicacion").val(r.fecha_radicacion);
             $("#tipo_afiliacion").val(r.tipo_afiliacion);
            $("#tipo_tramite_id").val(r.tipo_tramite_id);
           
            $("#tipo_identificacion_id").val(r.tipo_identificacion_id);
            $("#identificacion").val(r.identificacion);
            $("#municipioexp_id").val(r.municipioexp_id);
            $("#name_user").val(r.name_user);
            $("#nombre2").val(r.nombre2);
            $("#last_name_user").val(r.last_name_user);
            $("#apellido2").val(r.apellido2);
            $("#fecha_nacimiento").val(r.fecha_nacimiento);
            $("#sexo_id").val(r.sexo_id);
            $("#municipio_id").val(r.municipio_id);  
            $("#estado_civil_id").val(r.estado_civil_id);
            $("#municipiores_id").val(r.municipiores_id); 
            $("#direccion").val(r.direccion);  
            $("#mail_user").val(r.mail_user);
            $("#regimen_id").val(r.regimen_id);
            $("#poblacion_id").val(r.poblacion_id);
            $("#phone_user").val(r.phone_user);
            $("#phone_user").val(r.phone_user);
              




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
         $("#listado").load("?modulo=user&accion=listar", parametros);
     }




     <?php

        function codigo_captcha(){

                $k="";
                $paramentros="123456789000";
                $maximo=strlen($paramentros)-1;

                for($i=0; $i<7; $i++){

                    $k.=$paramentros{mt_rand(0,$maximo)};

                }

                return $k;

        }

?>







 </script>

 <script type="text/javascript">

       $("#tipo_afiliacion").change(function() {

        if($(this).value =="colectiva")  {
        $("#formuario-colectivo").show();
      } else {     

     $("#formuario-colectivo").show();
}

     }  );



  $("#id_rol").change(function() {

    if($(this).value =="1")  { 
        $("#formuario-afiliacion").hide();
        $("#formuario-empleado").hide();
        $("#formuario-admin").show();
      } else {     
     $("#formuario-admin").show();
 
 }


         }  );


       $("#id_rol").change(function() {

        if($(this).value =="3")  {
        $("#formuario-empleado").hide();
        $("#formuario-admin").hide();
        $("#formuario-afiliacion").show();
      } else {     

     $("#formuario-afiliacion").show();
    
}

     }  );



      $("#id_rol").change(function() {
        if($(this).value =="3")  {
        $("#formuario-empleado").show();
        $("#formuario-afiliacion").hide();
        $("#formuario-admin").hide();
      } else {     

     $("#formuario-empleado").show();
   
}

     }  );











//   $("#id_rol").change(function() {

//     if($(this).value =="1")  { 
//         $("#formuario-afiliacion").hide();
//         $("#formuario-empleado").hide();
//       } else {     
//      $("#formuario-admin").show();
//      $("#formuario-afiliacion").hide();
//         $("#formuario-empleado").hide();
//  }
// else 
//     if($(this).value =="2")  { 
//         $("#formuario-admin").hide();
//         $("#formuario-empleado").hide();
//       } else {     
//      $("#formuario-afiliacion").show();
//         $("#formuario-admin").hide();
//         $("#formuario-empleado").hide();
//     }   

// else
//  if ($(this).value =="3") { 
//     $("#formuario-afiliacion").hide();
//     $("#formuario-admin").hide();
// }else {     
//      $("#formuario-empleado").show();
//      $("#formuario-afiliacion").hide();
//     $("#formuario-admin").hide();
// }

//       }  );






 </script>