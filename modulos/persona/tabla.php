<?php
$filtros = "";

if (isset($_GET['identifica']) &&  $_GET['identifica'] != "") {
    $idetifica = $_GET['identifica'];
    $idetifica = str_replace(" ", "%", $idetifica);
    $filtros .= " AND Num_Identificacion LIKE '%$idetifica%'";
}

if (isset($_GET['nombre']) &&  $_GET['nombre'] != "") {
    $nombre = $_GET['nombre'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= " AND CONCAT_WS(' ',p.primer_nombre,p.primer_apellido) LIKE '%$nombre%'";
}

if (isset($_GET['fecha']) == true &&  $_GET['fecha']  != "") {
    $filtros .= " AND p.fecha_nacimiento = '$_GET[fecha]' ";
}

if (isset($_GET['municipio']) &&  $_GET['municipio'] != "") {
    $municipio = $_GET['municipio'];
    $municipio = str_replace(" ", "%", $municipio);
    $filtros .= " AND m.nombre LIKE '%$municipio%'";
}

if (isset($_GET['telefono']) &&  $_GET['telefono'] != "") {
    $telefono = $_GET['telefono'];
    $telefono = str_replace(" ", "%", $telefono);
    $filtros .= " AND telefono_principal LIKE '%$telefono%'";
}

if (isset($_GET['telefono_alt']) &&  $_GET['telefono_alt'] != "") {
    $telefono = $_GET['telefono_alt'];
    $telefono = str_replace(" ", "%", $telefono);
    $filtros .= " AND telefono_alternativo LIKE '%$telefono%'";
}

$sql_base = "SELECT              
    p.id_persona,
    p.Num_Identificacion,
    CONCAT_WS(' ', p.primer_nombre, p.primer_apellido) AS nombre,
    p.fecha_nacimiento,
    m.nombre AS municipio,
    p.telefono_principal,
    p.telefono_alternativo,
    d.nombre AS departamento
    FROM persona p
    INNER JOIN municipio m ON p.id_municipio_de_nacimiento = m.id
    INNER JOIN departamento d ON m.departamento = d.id
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
    <table class="table table-striped mx-auto">
        <thead>
            <tr>
                <th>No</th>
                <th>Identific.</th>
                <th>Nombre</th>
                <th>Fecha naci.</th>
                <th>Municipio Naci</th>
                <th>Telefono</th>
                <th>Telefono alternativo</th>
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
        </thead>
        <tbody>
            <?php
            $num = $primer_registro  + 1;
            $rs = mysqli_query($conexion, $sql_final);
            while ($row = mysqli_fetch_assoc($rs)) {
                echo "<tr>";
                echo "<td>$num</td>";
                echo "<td>$row[Num_Identificacion]</td>";
                echo "<td>$row[nombre]</td>";
                echo "<td>$row[fecha_nacimiento]</td>";
                echo "<td>$row[municipio]</td>";
                echo "<td>$row[telefono_principal]</td>";
                echo "<td>$row[telefono_alternativo]</td>";
                echo "<td class='acciones'>
                            <a href='javascript:;' class='eliminar' onclick='eliminar(\"$row[id_persona]\")'>
                                <i class='fa fa-trash'></i>
                            </a>
                            <a href='javascript:;' class='modificar' onclick='modificar(\"$row[id_persona]\")'>
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