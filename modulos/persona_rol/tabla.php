<?php
$filtros = "";

if (isset($_GET['b_usuario']) &&  $_GET['b_usuario'] != "") {
    $usuario = $_GET['b_usuario'];
    $usuario = str_replace(" ", "%", $usuario);
    $filtros .= " AND CONCAT_WS(' ', o.primer_nombre, o.primer_apellido)  LIKE '%$usuario%'";
}

if (isset($_GET['b_rol']) &&  $_GET['b_rol'] != "") {
    $rol = $_GET['b_rol'];
    $rol = str_replace(" ", "%", $rol);
    $filtros .= " AND p.nombre LIKE '%$rol%'";
}

$sql_base = "SELECT 
    u.id_persona_rol,
    u.id_persona,
    u.id_rol,
    p.nombre AS rol,
    CONCAT_WS(' ', o.primer_nombre, o.primer_apellido) AS usuario      
    FROM persona_rol u 
    JOIN rol p ON u.id_rol = p.id_rol
    inner join persona o ON u.id_persona = o.id_persona
    WHERE TRUE $filtros
    ORDER BY usuario
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
                <th>Usuario</th>
                <th>Nombre rol</th>
                <th>Acciones</th>
            </tr>
            <tr id="tr-filtros" class="<?php echo $filtros != '' ?  '' : 'd-none' ?>  ">
                <th scope="col"></th>
                <th scope="col">
                    <input type="text" name="b_usuario" class="form-control form-control-sm" value="<?php echo isset($_GET['b_usuario']) ? $_GET['b_usuario'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="b_rol" class="form-control form-control-sm" value="<?php echo isset($_GET['b_rol']) ? $_GET['b_rol'] : ""  ?>" />
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
                    echo "<td>$row[usuario]</td>";
                    echo "<td>$row[rol]</td>";
                    echo "<td class='acciones'>
                                <a href='javascript:;' class='eliminar' onclick='eliminar(\"$row[id_persona_rol]\")'>
                                    <i class='fa fa-trash'></i>
                                </a>
                                <a href='javascript:;' class='modificar' onclick='modificar(\"$row[id_persona_rol]\")'>
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