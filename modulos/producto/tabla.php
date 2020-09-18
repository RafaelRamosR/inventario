<?php

$filtros = "";

if (isset($_GET['nombre_producto']) == true &&  $_GET['nombre_producto']  != "") {
    $filtros .= " AND p.id_producto = '$_GET[nombre_producto]' ";
}

if (isset($_GET['tipo_producto']) == true &&  $_GET['tipo_producto']  != "") {
    $filtros .= " AND p.id_tipo_producto = '$_GET[tipo_producto]' ";
}

if (isset($_GET['modelo']) == true &&  $_GET['modelo']  != "") {
    $filtros .= " AND p.modelo = '$_GET[modelo]' ";
}

if (isset($_GET['fecha_adquisicion']) == true &&  $_GET['fecha_adquisicion']  != "") {
    $filtros .= " AND p.fecha_adquisicion = '$_GET[fecha_adquisicion]' ";
}

if (isset($_GET['proveedor']) == true &&  $_GET['proveedor']  != "") {
    $filtros .= " AND p.id_provedore = '$_GET[proveedor]' ";
}

if (isset($_GET['referencia']) == true &&  $_GET['referencia']  != "") {
    $filtros .= " AND p.referencia = '$_GET[referencia]' ";
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
        FROM
            producto p
        INNER JOIN
            tipo_producto tp ON p.id_tipo_producto = tp.id_tipo_producto
        INNER JOIN
            proveedores pr ON p.id_provedore = pr.id_proveedor
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
                    <input type="text" name="identifica" class="form-control form-control-sm" value="<?php echo isset($_GET['identifica']) ? $_GET['identifica'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="nombre" class="form-control form-control-sm" value="<?php echo isset($_GET['nombre']) ? $_GET['nombre'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="date" name="fecha" class="form-control form-control-sm" value="<?php echo isset($_GET['fecha_nacimiento']) ? $_GET['fecha_nacimiento'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="municipio" class="form-control form-control-sm" value="<?php echo isset($_GET['municipio']) ? $_GET['municipio'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="telefono" class="form-control form-control-sm" value="<?php echo isset($_GET['telefono']) ? $_GET['telefono'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="telefono_alt" class="form-control form-control-sm" value="<?php echo isset($_GET['telefono_alt']) ? $_GET['telefono_alt'] : ""  ?>" />
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
                <td class="card-footer text-center" colspan="8">
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