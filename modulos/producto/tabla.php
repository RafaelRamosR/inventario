<?php

$filtros = "";

if (isset($_GET['nombre_producto']) &&  $_GET['nombre_producto'] != "") {
    $nombre = $_GET['nombre_producto'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  p.nombre LIKE '%$nombre%'";
}

if (isset($_GET['tipo_producto']) &&  $_GET['tipo_producto'] != "") {
    $nombre = $_GET['tipo_producto'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  tp.nombre LIKE '%$nombre%'";
}

if (isset($_GET['modelo']) == true &&  $_GET['modelo']  != "") {
    $nombre = $_GET['modelo'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  p.modelo LIKE '%$nombre%'";
}

if (isset($_GET['stock']) == true &&  $_GET['stock']  != "") {
    $nombre = $_GET['stock'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  p.stock LIKE '%$nombre%'";
}

if (isset($_GET['fecha_adquisicion']) == true &&  $_GET['fecha_adquisicion']  != "") {
    $filtros .= " AND p.fecha_adquisicion = '$_GET[fecha_adquisicion]' ";
}

if (isset($_GET['proveedor']) == true &&  $_GET['proveedor']  != "") {
    $nombre = $_GET['proveedor'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  pr.nombre LIKE '%$nombre%'";
}

if (isset($_GET['referencia']) == true &&  $_GET['referencia']  != "") {
    $nombre = $_GET['referencia'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  p.referencia LIKE '%$nombre%'";
}

$sql_base = "SELECT           
    p.id_producto,
    p.nombre AS nombre_producto,
    tp.nombre AS nombre_tipo,
    p.modelo,
    p.stock,
    p.fecha_adquisicion,
    pr.nombre AS proveedor,
    p.referencia
    FROM producto p
    INNER JOIN tipo_producto tp ON p.id_tipo_producto = tp.id_tipo_producto
    INNER JOIN proveedores pr ON p.id_provedore = pr.id_proveedor
    WHERE TRUE $filtros
";

//Paginación
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
                <th>No</th>
                <th>Producto</th>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>Stock</th>
                <th>Adquisicion</th>
                <th>Proveedor</th>
                <th>Referencia</th>
                <th>Acciones</th>
            </tr>
            <tr id="tr-filtros" class="<?php echo $filtros != '' ?  '' : 'd-none' ?>  ">
                <th scope="col"></th>
                <th scope="col">
                    <input type="text" name="nombre_producto" class="form-control form-control-sm" value="<?php echo isset($_GET['nombre_producto']) ? $_GET['nombre_producto'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="tipo_producto" class="form-control form-control-sm" value="<?php echo isset($_GET['tipo_producto']) ? $_GET['tipo_producto'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="modelo" class="form-control form-control-sm" value="<?php echo isset($_GET['modelo']) ? $_GET['modelo'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="stock" class="form-control form-control-sm" value="<?php echo isset($_GET['stock']) ? $_GET['stock'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="date" name="fecha_adquisicion" class="form-control form-control-sm" value="<?php echo isset($_GET['fecha_adquisicion']) ? $_GET['fecha_adquisicion'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="proveedor" class="form-control form-control-sm" value="<?php echo isset($_GET['proveedor']) ? $_GET['proveedor'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="referencia" class="form-control form-control-sm" value="<?php echo isset($_GET['referencia']) ? $_GET['referencia'] : ""  ?>" />
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
            $num = $primer_registro  + 1;
            $rs = mysqli_query($conexion, $sql_final);
            while ($row = mysqli_fetch_assoc($rs)) {
                echo "<tr>";
                echo "<td>$num</td>";
                echo "<td>$row[nombre_producto]</td>";
                echo "<td>$row[nombre_tipo]</td>";
                echo "<td>$row[modelo]</td>";
                echo "<td>$row[stock]</td>";
                echo "<td>$row[fecha_adquisicion]</td>";
                echo "<td>$row[proveedor]</td>";
                echo "<td>$row[referencia]</td>";
                echo "<td class='acciones'>
                        <a href='javascript:;' class='eliminar' onclick='eliminar(\"$row[id_producto]\")'>
                            <i class='fa fa-trash'></i>
                        </a>
                        <a href='javascript:;' class='modificar' onclick='modificar(\"$row[id_producto]\")'>
                            <i class='fa fa-pencil-alt modificar'></i>
                        </a>
                    </td>
                ";
                echo "</tr>";
                $num++;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="card-footer text-center" colspan="9">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary btn-rounded btn-sm" onclick="mover_pagina('1')">
                            <i class="fas fa-angle-double-left"></i>
                        </button>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm" onclick="mover_pagina('<?php echo $pagina_actual - 1 ?>')">
                            <i class="fas fa-angle-left"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-rounded btn-sm">
                            <input class="utch" type="text" id="pagina_actual" value="<?php echo $pagina_actual ?>" onchange="mover_pagina(this.value)">
                        </button>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm" disabled>
                            <input class="utch" type="text" id="cantidad_paginas" readonly value="<?php echo $cantidad_paginas ?>" disabled>
                        </button>

                        <button type="button" class="btn btn-primary btn-rounded btn-sm" onclick="mover_pagina('<?php echo $pagina_actual + 1 ?>')">
                            <i class="fas fa-angle-right"></i>
                        </button>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm" onclick="mover_pagina('<?php echo $cantidad_paginas ?>')">
                            <i class="fas fa-angle-double-right"></i>
                        </button>
                    </div>

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