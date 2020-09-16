<div id="" class="content mt-5 mb-5" style="width:700px; margin:auto; ">

    <div class="card">
        <div class="card-header">
            <h4 id="titulo">Reporte 3</h4>

        </div>

        <div class="card-body">
            <form id="formulario" method="post" target="_blank" action="?modulo=reporte3&accion=mostrar">

                <div class="form-group row">
                    <label for="municipio_id" class="col-sm-3 col-form-label">Municipio nacim</label>
                    <div class="col-sm-9">
                        <select class="form-control " id="municipio_id" name="municipio_id">
                            <option value="">(Seleccionar municipio de nacimiento)</option>
                            <?php
                            $sql2 = "SELECT 
                                        m.id_municipio,
                                        CONCAT_WS(': ', d.nombre, m.nombre) AS nombre
                                    FROM
                                        consultora.municipio m
                                            JOIN
                                        consultora.departamento d ON m.id_departamento = d.id_departamento
                                    ORDER BY nombre";
                            $rs2 = mysqli_query($conexion, $sql2);
                            while ($rw1 = mysqli_fetch_assoc($rs2)) {

                                echo "<option value='$rw1[id_municipio]'>$rw1[nombre]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="clave" class="col-sm-3 col-form-label">Formato</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="formato" name="formato">
                            <option>(Seleccionar formato)</option>
                            <option value="html">Ver en linea</option>
                            <option value="pdf" selected>Archivo PDF</option>
                            <option value="doc">Microsoft Word</option>
                            <option value="xls">Microsoft Excel</option>
                        </select>
                    </div>
                </div>

                <hr />
                <div class="form-group row mb-0">
                    <div class="col-sm-12 text-right">
                        <button type="submit" id="btn-iniciar" class="btn btn-lg btn-block btn-secondary">Mostrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>