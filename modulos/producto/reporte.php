<div class="container mt-5 mb-5" style="max-width:700px">
    <div class="card">
        <div class="card-header text-center">Reporte de productos</div>
        <div class="card-body">
            <form method="post" target="_blank" action="?modulo=producto&accion=descarga">

                <div class="form-group row">
                    <label for="nombre_producto" class="col-sm-4 col-form-label">Nombre producto</label>
                    <div class="col-sm-8">
                        <input type="text" name="nombre_producto" class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tipo_producto" class="col-sm-4 col-form-label">Tipo producto</label>
                    <div class="col-sm-8">
                        <input type="text" name="tipo_producto" class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fecha_adquisicion" class="col-sm-4 col-form-label">Fecha adquisición</label>
                    <div class="col-sm-8">
                        <input type="date" name="fecha_adquisicion" class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="modelo" class="col-sm-4 col-form-label">Modelo</label>
                    <div class="col-sm-8">
                        <input type="text" name="modelo" class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="stock" class="col-sm-4 col-form-label">Stock</label>
                    <div class="col-sm-8">
                        <input type="text" name="stock" class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="proveedor" class="col-sm-4 col-form-label">Proveedor</label>
                    <div class="col-sm-8">
                        <input type="text" name="proveedor" class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="referencia" class="col-sm-4 col-form-label">Referencia</label>
                    <div class="col-sm-8">
                        <input type="text" name="referencia" class="form-control form-control-sm" />
                    </div>
                </div>
                <!-- Tipo de formato -->
                <div class="form-group row">
                    <label for="formato" class="col-sm-4 col-form-label">Formato</label>
                    <div class="col-sm-8">
                        <select class="form-control " id="formato" name="formato" required>
                            <option value="">(Seleccionar formato de salida)</option>
                            <option value="html">Ver en linea</option>
                            <option value="pdf">Archivo PDF</option>
                            <option value="excel">Microsoft Excel</option>
                            <option value="word">Microsoft Word</option>

                        </select>
                    </div>
                </div>
                <hr />

                <div class="form-group row mb-0">
                    <div id="div-btn" class="col-sm-12 text-right">
                        <a class="btn btn-sm btn-secondary" href="javascript:history.back()">Volver</a>
                        <input type="submit" class="btn btn-sm btn-success" id="btn-desca" value="Generar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>