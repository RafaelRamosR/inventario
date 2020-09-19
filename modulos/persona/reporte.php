<div class="container mt-4" style="max-width:700px">
  <div class="card">
    <div class="card-header">Reporte de personas</div>
    <div class="card-body">
      <form method="post" target="_blank" action="?modulo=persona&accion=descarga">

        <div class="form-group row">
          <label for="numero_identificacion" class="col-sm-4 col-form-label">Número de identificación</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
          </div>
        </div>

        <div class="form-group row">
          <label for="numero_identificacion" class="col-sm-4 col-form-label">Número de identificación</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
          </div>
        </div>

        <div class="form-group row">
          <label for="numero_identificacion" class="col-sm-4 col-form-label">Número de identificación</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
          </div>
        </div>

        <div class="form-group row">
          <label for="numero_identificacion" class="col-sm-4 col-form-label">Número de identificación</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion">
          </div>
        </div>
        <!-- Tipo de formato -->
        <div class="form-group row">
          <label for="formato" class="col-sm-3 col-form-label">Formato</label>
          <div class="col-sm-9">
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