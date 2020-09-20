<div class="container mt-5 mb-5" style="max-width:700px">
  <div class="card">
    <div class="card-header text-center">Reporte de personas</div>
    <div class="card-body">
      <form method="post" target="_blank" action="?modulo=persona_rol&accion=descarga">

        <div class="form-group row">
          <label for="b_usuario" class="col-sm-4 col-form-label">Usuario</label>
          <div class="col-sm-8">
            <input type="text" name="b_usuario" class="form-control form-control-sm" />
          </div>
        </div>

        <div class="form-group row">
          <label for="b_rol" class="col-sm-4 col-form-label">Nombre rol</label>
          <div class="col-sm-8">
            <input type="text" name="b_rol" class="form-control form-control-sm" />
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