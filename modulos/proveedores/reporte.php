<div class="container mt-5 mb-5" style="max-width:700px">
  <div class="card">
    <div class="card-header text-center">Reporte de proveedores</div>
    <div class="card-body">
      <form method="post" target="_blank" action="?modulo=proveedores&accion=descarga">

        <div class="form-group row">
          <label for="nombre" class="col-sm-4 col-form-label">Nombre proveedor</label>
          <div class="col-sm-8">
            <input type="text" name="nombre" class="form-control form-control-sm" />
          </div>
        </div>

        <div class="form-group row">
          <label for="telefono" class="col-sm-4 col-form-label">Teléfono</label>
          <div class="col-sm-8">
            <input type="text" name="telefono" class="form-control form-control-sm" />
          </div>
        </div>

        <div class="form-group row">
          <label for="direccion" class="col-sm-4 col-form-label">Dirección</label>
          <div class="col-sm-8">
            <input type="text" name="direccion" class="form-control form-control-sm" />
          </div>
        </div>

        <div class="form-group row">
          <label for="correo" class="col-sm-4 col-form-label">Correo</label>
          <div class="col-sm-8">
            <input type="text" name="correo" class="form-control form-control-sm" />
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
            <input type="submit" class="btn btn-secondary" id="btn-desca" value="Generar">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>