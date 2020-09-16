<?php
$filtros = "";


$sql_base = "SELECT 
    *
FROM
    contenido
       
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
<table class="table table-striped">
    <thead>
        <tr>

            <th scope="col">Num.</th>

            <th scope="col">Modulo</th>
            <th scope="col">Titulo</th>

            <th scope="col" style="text-align: center;">Acciones</th>
        </tr>

        <tr id="tr-filtros" class="<?php echo $filtros != '' ?  '' : 'd-none' ?>  ">

            <th scope="col"></th>

            <th scope="col">
                <input type="text" name="identifica" class="form-control form-control-sm" value="<?php echo isset($_GET['modulo']) ? $_GET['modulo'] : ""  ?>" />

            </th>
            <th scope="col">
                <input type="text" name="nombre" class="form-control form-control-sm" value="<?php echo isset($_GET['titulo']) ? $_GET['titulo'] : ""  ?>" />

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

                <td><?php echo $mostrar['modulo'] ?></td>
                <td><?php echo $mostrar['titulo'] ?></td>

                <td style="text-align: center;">
                    <button type="button" class="btn btn-sm btn-warning" onclick="modificar('<?php echo $mostrar['contenido_id'] ?>')">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="eliminar('<?php echo $mostrar['contenido_id'] ?>')">
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
            <td class="btn-group" role="group" colspan="6">
                <button type="button" class="btn btn-primary btn-rounded btn-sm" onclick="mover_pagina('1')">
                    <i class="fas fa-step-backward"></i>
                </button>
                <button type="button" class="btn btn-primary btn-rounded btn-sm" onclick="mover_pagina('<?php echo $pagina_actual - 1 ?>')">
                    <i class="fas fa-caret-left"></i>
                </button>

                <button type="button" class="btn btn-primary btn-rounded btn-sm" disabled>
                <input style="width: 50px; text-align:center" type="text" id="pagina_actual" value="<?php echo $pagina_actual ?>" onchange="mover_pagina(this.value)" />
                </button>
                <button type="button" class="btn btn-primary btn-rounded btn-sm" disabled>
                <input style="width: 50px; text-align:center" type="text" id="cantidad_paginas" readonly value="<?php echo $cantidad_paginas ?>" />
                </button>

                <button type="button" class="btn btn-primary btn-rounded btn-sm" onclick="mover_pagina('<?php echo $pagina_actual + 1 ?>')">
                    <i class="fas fa-caret-right"></i>
                </button>
                <button type="button" class="btn btn-primary btn-rounded btn-sm" onclick="mover_pagina('<?php echo $cantidad_paginas ?>')">
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