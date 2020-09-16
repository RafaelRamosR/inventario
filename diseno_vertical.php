<!doctype html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.css" />
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>INVENTARIO</title>
    <style type="text/css">

    </style>
</head>

<body>
    <div class="container">
        <?php
        require_once("encabezado.php");
        ?>
        <div class="row">
            <div class="col-md-2" style="border:1px solid silver">


                <ul class="nav flex-column">
                    <?php
                    require_once("menu.php");
                    ?>

                </ul>


            </div>
            <div class="col-md-10" style="border:1px solid silver">
                <?php
                
                 if ($mod_permitir_acceso == true) {
                require_once($mod_ruta_archivo);
            } else {
            ?>
                <div class="alert alert-danger mt-2" role="alert">
                    Acceso denegado !!!
                </div>
                ?>
            </div>
        </div>

        <?php
        require_once("pie.php");
        ?>

    </div>

</body>

</html>