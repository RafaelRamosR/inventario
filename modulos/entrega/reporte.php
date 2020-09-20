<div class="container mt-5 mb-5" style="max-width:700px">
    <div class="card">
        <div class="card-header text-center">Reporte de productos</div>
        <div class="card-body">
            <form method="post" target="_blank" action="?modulo=entrega&accion=descarga">

                <div class="form-group row">
                    <label for="producto" class="col-sm-4 col-form-label">Producto</label>
                    <div class="col-sm-8">
                        <input type="text" name="producto" class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="adquisicion" class="col-sm-4 col-form-label">Fecha adquisición</label>
                    <div class="col-sm-8">
                        <input type="date" name="adquisicion" class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="entrega" class="col-sm-4 col-form-label">Fecha entrega</label>
                    <div class="col-sm-8">
                        <input type="date" name="entrega" class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="referencia" class="col-sm-4 col-form-label">Referencia</label>
                    <div class="col-sm-8">
                        <input type="text" name="referencia" class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="responsable" class="col-sm-4 col-form-label">Responsable</label>
                    <div class="col-sm-8">
                        <input type="text" name="responsable" class="form-control form-control-sm" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cantidad" class="col-sm-4 col-form-label">Cantidad</label>
                    <div class="col-sm-8">
                        <input type="text" name="cantidad" class="form-control form-control-sm" />
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