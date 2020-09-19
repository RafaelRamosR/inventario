<div class="container mt-5 mb-5" style="max-width:700px">
  <div class="card">
    <div class="card-header text-center">Reporte de personas</div>
    <div class="card-body">
      <form method="post" target="_blank" action="?modulo=persona&accion=descarga">

        <div class="form-group row">
          <label for="identifica" class="col-sm-4 col-form-label">Identificación</label>
          <div class="col-sm-8">
            <input type="text" name="identifica" class="form-control form-control-sm" />
          </div>
        </div>

        <div class="form-group row">
          <label for="nombre" class="col-sm-4 col-form-label">Nombre usuario</label>
          <div class="col-sm-8">
            <input type="text" name="nombre" class="form-control form-control-sm" />
          </div>
        </div>

        <div class="form-group row">
          <label for="fecha" class="col-sm-4 col-form-label">Fecha nacimiento</label>
          <div class="col-sm-8">
            <input type="date" name="fecha" class="form-control form-control-sm" />
          </div>
        </div>

        <div class="form-group row">
          <label for="municipio" class="col-sm-4 col-form-label">Mun. nacimiento</label>
          <div class="col-sm-8">
            <input type="text" name="municipio" class="form-control form-control-sm" />
          </div>
        </div>

        <div class="form-group row">
          <label for="telefono" class="col-sm-4 col-form-label">Teléfono</label>
          <div class="col-sm-8">
            <input type="text" name="telefono" class="form-control form-control-sm" />
          </div>
        </div>

        <div class="form-group row">
          <label for="telefono_alt" class="col-sm-4 col-form-label">Teléfono alternativo</label>
          <div class="col-sm-8">
            <input type="text" name="telefono_alt" class="form-control form-control-sm" />
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