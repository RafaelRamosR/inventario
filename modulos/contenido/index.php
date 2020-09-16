<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>


<style type="text/css">
    .acciones a {
        display: inline-block;
        margin-right: 5px;
        color: gray;
    }

    /*
        .acciones a:hover {
          
            color:red ;
        }
    */

    .acciones a.eliminar {
        color: red !important;
    }

    .acciones a.eliminar:hover {
        color: gray !important;
    }

    .acciones a.modificar:hover {
        color: green !important;
    }

    .acciones a.mostrar:hover {
        color: blue !important;
    }
</style>



<div id="contenedor-listado" class="content mt-3" style="max-width:1000px; margin:auto">

    <div class="card">
        <div class="card-header">
            Listado de contenido
            <button id="btn-mostrar-filtros" class="btn btn-sm btn-secondary float-right ml-1">Buscar</button>

            <button id="btn-agregar" class="btn btn-sm btn-secondary float-right ml-1">Agregar</button>
        </div>
        <div id="div-formulario-busqueda" class="card-body d-none">

            <form id="formulario-busqueda">
                <div class="form-group row">
                    <label for="b-titulo" class="col-sm-3 col-form-label">Título</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="titulo" id="b-titulo" placeholder="Título">
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
</div>






<!-- Formulario -->

<div id="contenedor-formulario" class="content mt-3" style="margin:auto; display:none">
    <div class="card">
        <div class="card-header">
            <span id="titulo"> Agregar contenido</span>
        </div>

        <div class="card-body">
            <form id="formulario">
                <input type="hidden" name="id_contenido" id="id_contenido" />

                <div class="form-group row">
                    <label for="modulo" class="col-sm-3 col-form-label">Módulo</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="modulo" name="modulo" placeholder="Módulo">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="titulo2" class="col-sm-3 col-form-label">Título</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="titulo2" name="titulo2" placeholder="Título">
                    </div>
                </div>


                <div class="form-group">
                    <label for="contenido">Contenido</label>

                    <textarea class="form-control" id="contenido" name="contenido" placeholder="Contenido" rows="20" disabled></textarea>

                </div>

                <hr />
                <div class="form-group row mb-0">
                    <div class="col-sm-12 text-right">
                        <button type="button" id="btn-regresar" class="btn btn-sm btn-light">Regresar</button>
                        <button type="button" id="btn-guardar" class="btn btn-sm btn-secondary">Guardar</button>
                        <button type="button" id="btn-modificar" class="btn btn-sm btn-secondary">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- Fin formulario -->
<script type="text/javascript">
    $("#btn-agregar").click(function() {
        $("#titulo").html("Agregar contenido");
        $("#contenedor-listado").hide();
        $("#contenedor-formulario").show();

        $("#btn-guardar").show();
        $("#btn-modificar").hide();
        $("#formulario")[0].reset(); //limpiar formulario
        $("#formulario input, #formulario select").prop("disabled", false);
        tinyMCE.get('contenido').getBody().setAttribute('contenteditable', true);

    });

    $("#btn-guardar").click(function() {
        var parametros = $("#formulario").serialize();
        var contenido = tinyMCE.get('contenido').getContent();
            parametros = parametros + "&contenido=" + encodeURIComponent(contenido);
            // alert(parametros);
        $.post("?modulo=contenido&accion=agregar", parametros, function(respuesta) {
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
            var contenido = tinyMCE.get('contenido').getContent();
            parametros = parametros + "&contenido=" + encodeURIComponent(contenido);
            // alert(parametros);
            // return ;
            $.post("?modulo=contenido&accion=modificar", parametros, function(respuesta) {
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

    function mostrar(id_contenido) {
        $("#titulo").html("Mostrar contenido");
        var parametros = "id_contenido=" + id_contenido;
        $.get("?modulo=contenido&accion=datos", parametros, function(respuesta) {
            $("#formulario")[0].reset(); //limpiar formulario
            $("#contenedor-listado").hide();
            $("#contenedor-formulario").show();

            $("#btn-guardar").hide();
            $("#btn-modificar").hide();

            $("#formulario")[0].reset(); //limpiar formulario
            $("#formulario input, #formulario select").prop("disabled", true);
            tinyMCE.get('contenido').getBody().setAttribute('contenteditable', false);
            var r = jQuery.parseJSON(respuesta);

            $("#id_contenido").val(r.id_contenido);
            $("#titulo2").val(r.titulo);
            $("#modulo").val(r.modulo);
            //$("#contenido").val(r.contenido);
            tinyMCE.get('contenido').setContent(r.contenido);

        });
    }

    function eliminar(id_contenido) {
        if (confirm("¿Realmente desea eliminar el registro?")) {
            var parametros = "id_contenido=" + id_contenido;
            $.post("?modulo=contenido&accion=eliminar", parametros, function(respuesta) {
                var r = jQuery.parseJSON(respuesta);
                alert(r.mensaje);
                if (r.error == false) {
                    cargar_listado();
                }
            });
        }
    }


    function modificar(id_contenido) {
        $("#titulo").html("Modificar contenido");
        var parametros = "id_contenido=" + id_contenido;
        $.get("?modulo=contenido&accion=datos", parametros, function(respuesta) {
            $("#formulario")[0].reset(); //limpiar formulario
            $("#contenedor-listado").hide();
            $("#contenedor-formulario").show();

            $("#btn-guardar").hide();
            $("#btn-modificar").show();
            $("#formulario")[0].reset(); //limpiar formulario
            $("#formulario input, #formulario select").prop("disabled", false);
            tinyMCE.get('contenido').getBody().setAttribute('contenteditable', true);
            $("#modulo").prop("disabled", true);



            var r = jQuery.parseJSON(respuesta);

            $("#id_contenido").val(r.id_contenido);
            $("#titulo2").val(r.titulo);
            $("#modulo").val(r.modulo);
            //$("#contenido").val(r.contenido);
            //tinyMCE.getInstanceById('contenido').setContent(r.contenido);
            tinyMCE.get('contenido').setContent(r.contenido);
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
        $("#listado").load("?modulo=contenido&accion=listar", parametros);
    }


    tinymce.init({
        selector: 'textarea#contenido',
        height: 500,
        menubar: true,

        language: 'es',
        /*plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
        ],*/
        plugins: 'print preview fullpage powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons',

        toolbar: 'undo redo | formatselect | ' +
            ' bold italic backcolor | alignleft aligncenter ' +
            ' alignright alignjustify | bullist numlist outdent indent |' +
            ' removeformat | help',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
        ]
    });
</script>