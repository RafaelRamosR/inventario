<?php
$filtros = "";

if (isset($_GET['identidad']) == true &&  $_GET['identidad']  != "") {
    $filtros .= " AND t.id_tipo_identidad = '$_GET[identidad]' ";
}

$sql_base = "SELECT             
    t.id_tipo_identidad,
    t.nombre
    FROM tipo_identidad t
    WHERE TRUE $filtros
    ORDER BY nombre
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
                <th>Nombre de tipo identidad</th>
                <th>Acciones</th>
            </tr>
            <tr id="tr-filtros" class="<?php echo $filtros != '' ?  '' : 'd-none' ?>  ">
                <th scope="col"></th>
                <th scope="col">
                    <input type="text" name="identifica" class="form-control form-control-sm" value="<?php echo isset($_GET['identifica']) ? $_GET['identifica'] : ""  ?>" />
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
                    echo "<td>$row[nombre]</td>";
                    echo "<td class='acciones'>
                                <a href='javascript:;' class='eliminar' onclick='eliminar(\"$row[id_tipo_identidad]\")'>
                                    <i class='fa fa-trash'></i>
                                </a>
                                <a href='javascript:;' class='modificar' onclick='modificar(\"$row[id_tipo_identidad]\")'>
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