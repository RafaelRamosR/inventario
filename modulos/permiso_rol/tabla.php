<?php
$filtros = "";

if (isset($_GET['b_rol']) == true &&  $_GET['b_rol']  != "") {
    $rol = $_GET['b_rol'];
    $rol = str_replace(" ", "%", $rol);
    $filtros .= " AND CONCAT_WS(' ', p.nombre) LIKE '%$rol%' ";
}
        
if (isset($_GET['b_modulo']) == true &&  $_GET['b_modulo']  != "") {
    $modulo = $_GET['b_modulo'];
    $modulo = str_replace(" ", "%", $modulo);
    $filtros .= " AND r.modulo LIKE '%$modulo%' ";
}
        
if (isset($_GET['b_accion']) == true &&  $_GET['b_accion']  != "") {
    $accion = $_GET['b_accion'];
    $accion = str_replace(" ", "%", $accion);
    $filtros .= " AND r.accion LIKE '%$accion%' ";
}

$sql_base = "SELECT 
    r.id_permiso_rol,
    r.id_rol,
    CONCAT_WS(' ', p.nombre) AS rol,     
    r.modulo,
    r.accion
    FROM permiso_rol r 
    JOIN rol p ON r.id_rol = p.id_rol
    WHERE TRUE $filtros
    ORDER BY rol
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
    <table class="table table-striped mx-auto">
        <thead>
            <tr>
                <th>No</th>
                <th>Rol</th>
                <th>Modulo</th>
                <th>Accion</th>
                <th>Acciones</th>
            </tr>
            <tr id="tr-filtros" class="<?php echo $filtros != '' ?  '' : 'd-none' ?>  ">
                <th scope="col"></th>
                <th scope="col">
                    <input type="text" name="b_rol" class="form-control form-control-sm" value="<?php echo isset($_GET['b_rol']) ? $_GET['b_rol'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="b_modulo" class="form-control form-control-sm" value="<?php echo isset($_GET['b_modulo']) ? $_GET['b_modulo'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="b_accion" class="form-control form-control-sm" value="<?php echo isset($_GET['b_accion']) ? $_GET['b_accion'] : ""  ?>" />
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
                    echo "<td>$row[rol]</td>";
                    echo "<td>$row[modulo]</td>";
                    echo "<td>$row[accion]</td>";
                    echo "<td class='acciones'>
                                <a href='javascript:;' class='eliminar' onclick='eliminar(\"$row[id_permiso_rol]\")'>
                                    <i class='fa fa-trash'></i>
                                </a>
                                <a href='javascript:;' class='modificar' onclick='modificar(\"$row[id_permiso_rol]\")'>
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