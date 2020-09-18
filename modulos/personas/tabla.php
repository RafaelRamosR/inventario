<?php
$filtros = "";
if (isset($_GET['identifica']) &&  $_GET['identifica'] != "") {
    $idetifica = $_GET['identifica'];
    //Buscar espacio y reemplazarlos por %
    $idetifica = str_replace(" ", "%", $idetifica);
    $filtros .= "  AND  identificacion LIKE '%$idetifica%'";
}

if (isset($_GET['nombre']) &&  $_GET['nombre'] != "") {
    $nombre = $_GET['nombre'];
    //Buscar espacio y reemplazarlos por %
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  CONCAT_WS(' ',persona.nombre,persona.apellido) LIKE '%$nombre%'";
}

if (isset($_GET['municipio']) &&  $_GET['municipio'] != "") {
    $municipio = $_GET['municipio'];
    //Buscar espacio y reemplazarlos por %
    $municipio = str_replace(" ", "%", $municipio);
    $filtros .= "  AND  municipio.nombre LIKE '%$municipio%'";
}

if (isset($_GET['telefono']) &&  $_GET['telefono'] != "") {
    $telefono = $_GET['telefono'];
    //Buscar espacio y reemplazarlos por %
    $telefono = str_replace(" ", "%", $telefono);
    $filtros .= "  AND  persona.telefono LIKE '%$telefono%'";
}

$sql_base = "SELECT persona_id,
                tipo_identificacion.nombre as tipo_identificacion,
                persona.identificacion,
                CONCAT_WS(' ',persona.nombre,persona.apellido) as nombre_completo,
                municipio.nombre as municipio,
                persona.fecha_nacimiento,
                persona.telefono
            FROM persona
                JOIN tipo_identificacion on persona.tipo_identificacion_id=tipo_identificacion.tipo_identificacion_id
                JOIN municipio on persona.municipio_id=municipio.municipio_id
            WHERE true $filtros

            ORDER BY nombre_completo
       
        ";

$num_reg_paginas = 5;
$pagina_actual = $_GET['pagina_actual'];

$sql_cantidad = "SELECT COUNT(*) FROM ($sql_base) as t";
$rs_cantidad = mysqli_query($conexion, $sql_cantidad);
$rw_cantidad = mysqli_fetch_row($rs_cantidad);
$cantidad_registros = $rw_cantidad[0];

$primer_registro = ($pagina_actual - 1) * $num_reg_paginas;


$cantidad_paginas = ceil($cantidad_registros / $num_reg_paginas);


$sql_final = $sql_base . " LIMIT $primer_registro , $num_reg_paginas  ";
?>
<form id="form-filtros">
    <table class="table table-striped">
        <thead>
            <tr>

                <th scope="col">Num.</th>

                <th scope="col">Identificación</th>
                <th scope="col">Nombre completo</th>

                <th scope="col">Municipio</th>
                <th scope="col">Telefono</th>
                <th scope="col" style="text-align: center;">Acciones</th>
            </tr>

            <tr id="tr-filtros" class="<?php echo $filtros != '' ?  '' : 'd-none' ?>  ">

                <th scope="col"></th>

                <th scope="col">
                    <input type="text" name="identifica" class="form-control form-control-sm" value="<?php echo isset($_GET['identifica']) ? $_GET['identifica'] : ""  ?>" />

                </th>
                <th scope="col">
                    <input type="text" name="nombre" class="form-control form-control-sm" value="<?php echo isset($_GET['nombre']) ? $_GET['nombre'] : ""  ?>" />

                </th>

                <th scope="col">
                    <input type="text" name="municipio" class="form-control form-control-sm" value="<?php echo isset($_GET['municipio']) ? $_GET['municipio'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="telefono" class="form-control form-control-sm" value="<?php echo isset($_GET['telefono']) ? $_GET['telefono'] : ""  ?>" />

                </th>
                <th scope="col" style="text-align: center;">
                    <button class="btn btn-sm btn-primary" onclick="mover_pagina('1')">
                        <i class="fas fa-search"></i>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php



            $result = mysqli_query($conexion, $sql_final);

            $num = $primer_registro  + 1;
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $num++ ?></td>

                    <td><?php echo $mostrar['identificacion'] ?></td>
                    <td><?php echo $mostrar['nombre_completo'] ?></td>

                    <td><?php echo $mostrar['municipio'] ?></td>
                    <td><?php echo $mostrar['telefono'] ?></td>
                    <td style="text-align: center;">
                        <button type="button" class="btn btn-sm btn-warning" onclick="modificar('<?php echo $mostrar['persona_id'] ?>')">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="eliminar('<?php echo $mostrar['persona_id'] ?>')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    <button type="button" class="btn btn-sm btn-dark" onclick="mover_pagina('1')">
                        <i class="fas fa-step-backward"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-dark" onclick="mover_pagina('<?php echo $pagina_actual - 1 ?>')">
                        <i class="fas fa-caret-left"></i>
                    </button>

                    <span>
                        <input style="width: 50px; text-align:center" type="text" id="pagina_actual" value="<?php echo $pagina_actual ?>" onchange="mover_pagina(this.value)" />
                        /
                        <input style="width: 50px; text-align:center" type="text" id="cantidad_paginas" readonly value="<?php echo $cantidad_paginas ?>" />

                    </span>

                    <button type="button" class="btn btn-sm btn-dark" onclick="mover_pagina('<?php echo $pagina_actual + 1 ?>')">
                        <i class="fas fa-caret-right"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-dark" onclick="mover_pagina('<?php echo $cantidad_paginas ?>')">
                        <i class=" fas fa-step-forward"></i>
                    </button>

                    <span>
                        <?php
                        echo "mostrando del ";
                        echo ($primer_registro + 1)  . " al " . ($primer_registro + $num_reg_paginas);
                        echo " de " . $cantidad_registros . " registro(s)";
                        ?>
                    </span>
                </td>
            </tr>
        </tfoot>
    </table>
</form>