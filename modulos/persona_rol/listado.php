<?php
require_once("conexion.php");
if (isset($_GET['pagina_actual'])) {
    $pagina = $_GET['pagina_actual'];
} else {
    $pagina = 1;
}

if (isset($_GET['num_registros'])) {
    $num_registros = $_GET['num_registros'];
} else {
    $num_registros = 10;
}


//Filtros de busqueda
$filtros = "";

if (isset($_GET['id_persona']) == true &&  $_GET['id_persona']  != "") {
    $filtros .= " AND u.id_persona = '$_GET[id_persona]' ";
}

if (isset($_GET['rol']) == true &&  $_GET['rol']  != "") {
    $filtros .= " AND u.id_rol = '$_GET[rol]' ";
}

$sql = "SELECT 
            u.id_persona_rol,
            u.id_persona,
            u.id_rol,
            p.nombre AS rol,
              CONCAT_WS(' ', o.primer_nombre, o.primer_apellido) AS usuar      
            
            FROM
            persona_rol u 
            JOIN
            rol p ON u.id_rol = p.id_rol
            inner join
            persona o ON u.id_persona = o.id_persona

        WHERE TRUE $filtros


                ";

//Paginación

$sql_cantidad = "SELECT COUNT(*) AS cantidad FROM ( $sql ) AS t

";
$rs_cantidad = mysqli_query($conexion, $sql_cantidad);
    echo mysqli_error($conexion);
$row_cantidad = mysqli_fetch_assoc($rs_cantidad);
$cantidad = $row_cantidad['cantidad'];
$num_paginas = ceil($cantidad / $num_registros);
$inicio = ($pagina - 1) * $num_registros;


$sql .= " ORDER BY nombre LIMIT $inicio, $num_registros  ";
?>
<table class="table table-bordered table-hover table-striped">
    <thead  class="thead-light" >
        <tr>
            <th style="width: 30px;">No</th>
            <th style="width: 50px;" >Usario</th>
            <th style="width: 50px;">Rol</th>
            <th style="width: 80px;" >Acciones</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
        $num = $inicio + 1;

        $rs = mysqli_query($conexion, $sql);
         echo mysqli_error($conexion);
        while ($row = mysqli_fetch_assoc($rs)) {
            echo "<tr>";
            echo "<td>$num</td>";
            echo "<td>$row[usuar]</td>";
            echo "<td>$row[rol]</td>";
               echo "<td class='acciones'>
                    
                    <a href='javascript:;' class='eliminar' onclick='eliminar(\"$row[id_persona_rol]\")'>
                        <i class='fas fa-trash'></i>
                    </a>
                    <a href='javascript:;' class='modificar' onclick='modificar(\"$row[id_persona_rol]\")'>
                        <i class='fas fa-pencil-alt modificar'></i>
                    </a>
                </td>";
            echo "</tr>";
            //$num = $num + 1;
            $num++;
            //$num += 1;
        }
        ?>
    </tbody>
</table>

<div class="card-footer">
    <form class="text-center" id="formulario-paginacion">
        <select id="num_registros" name="num_registros">
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>

<div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" class="btn btn-primary btn-rounded btn-sm" id="btn-inicio"><i class="fas fa-angle-double-left"></i></button>
      <button type="button" class="btn btn-primary btn-rounded btn-sm" id="btn-anterior"><i class="fas fa-angle-left"></i></button>
      
      <button type="button" class="btn btn-primary btn-rounded btn-sm" disabled><input class="utch" type="text" value="<?php echo $pagina ?>" id="pagina_actual" name="pagina_actual"></button>
      <button type="button" class="btn btn-primary btn-rounded btn-sm" disabled><input class="utch" type="text" value="<?php echo $num_paginas ?>" id="num_paginas" disabled></button>
      
      <button type="button" class="btn btn-primary btn-rounded btn-sm" id="btn-siguiente"><i class="fas fa-angle-right"></i></button>
      <button type="button" class="btn btn-primary btn-rounded btn-sm" id="btn-final"><i class="fas fa-angle-double-right"></i></button>
</div>


                <?php
                $desde = $inicio + 1;
                $hasta = $inicio+ $num_registros;
                echo "$desde - $hasta de $cantidad";
                ?>
    </form>
</div>

<script type="text/javascript">
    $("#btn-inicio").click(function() {
        $("#pagina_actual").val("1");
        cargar_listado();
    });

    $("#btn-anterior").click(function() {
        $pagina = parseInt($("#pagina_actual").val()) - 1;
        if ($pagina < 1) {
            $pagina = 1;
        }
        $("#pagina_actual").val($pagina);
        cargar_listado();
    });

    $("#btn-siguiente").click(function() {
        $pagina = parseInt($("#pagina_actual").val()) + 1;

        if ($pagina > parseInt($("#num_paginas").val())) {
            $pagina = parseInt($("#num_paginas").val());
        }

        $("#pagina_actual").val($pagina);
        cargar_listado();
    });

    $("#btn-final").click(function() {
        $pagina = parseInt($("#num_paginas").val());
        $("#pagina_actual").val($pagina);
        cargar_listado();
    });

    $("#num_registros").val("<?php echo $num_registros ?>");

    $("#num_registros, #pagina_actual").change(function() {
        cargar_listado();
    });
</script>