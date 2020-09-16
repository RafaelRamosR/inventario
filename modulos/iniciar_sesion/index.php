<div id="" class="content mt-5 mb-5" style="width:500px; margin:auto; ">

    <div class="card">
        <div class="card-header">
            <h4 id="titulo">Iniciar sesión</h4>

        </div>

        <div class="card-body">
            <form id="formulario" method="post" action="guardar.php">

                <div class="form-group row">
                    <label for="usuario" class="col-sm-3 col-form-label">Usuario</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="clave" class="col-sm-3 col-form-label">Clave</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave">
                    </div>
                </div>

                <hr />
                <div class="form-group row mb-0">
                    <div class="col-sm-12 text-right">
                        <button type="button" id="btn-iniciar" class="btn btn-lg btn-block btn-secondary">Iniciar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>


<script type="text/javascript">
    $("#btn-iniciar").click(function() {
        var parametros = $("#formulario").serialize();
        $.post("?modulo=iniciar-sesion&accion=iniciar", parametros, function(respuesta) {
            //jQuery.parseJSON convertir la respuesta en JSON en un arreglo asociativo
            var r = jQuery.parseJSON(respuesta);

            if (r.error == false) {
                window.location = "?modulo=inicio&accion=ver";
            } else {
                alert(r.mensaje);
            }

        });

    });
</script>