<?php
require_once("conexion.php");
if(isset($_GET['pagina_actual'])) {
    $pagina = $_GET['pagina_actual'];
} else {
    $pagina=1;
}

if(isset($_GET['num_registros'])) {
    $num_registros = $_GET['num_registros'];
} else {
    $num_registros=5;
}

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



$sql = "SELECT           
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

$sql_cantidad = "SELECT COUNT(*) AS cantidad FROM ( $sql ) AS t";
$rs_cantidad = mysqli_query($conexion,$sql_cantidad);
$row_cantidad = mysqli_fetch_assoc($rs_cantidad);
$cantidad = $row_cantidad['cantidad'];
$num_paginas = ceil ($cantidad/$num_registros);
$inicio = ($pagina-1)*$num_registros;
$sql .= " ORDER BY nombre_producto LIMIT $inicio, $num_registros  ";
?>

<table class="table table-striped" align="center">
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
    </thead>
    <tbody>
        <?php
        $num = $inicio+1;
        
        $rs = mysqli_query($conexion, $sql);
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
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
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
        $("#btn-inicio").click(function(){
            $("#pagina_actual").val("1");
            cargar_listado();
        });

        $("#btn-anterior").click(function(){
            $pagina = parseInt($("#pagina_actual").val())-1;
            if($pagina <1) {
                $pagina=1;
            }
            $("#pagina_actual").val($pagina);
            cargar_listado();
        });    

        $("#btn-siguiente").click(function(){
            $pagina = parseInt($("#pagina_actual").val())+1;
 
            if($pagina > parseInt($("#num_paginas").val()) ) {
                $pagina=parseInt($("#num_paginas").val());
            }

            $("#pagina_actual").val($pagina);
            cargar_listado();
        });

        $("#btn-final").click(function(){
            $pagina = parseInt($("#num_paginas").val());
            $("#pagina_actual").val($pagina);
            cargar_listado();
        }); 

        $("#num_registros").val("<?php echo $num_registros ?>");

        $("#num_registros, #pagina_actual").change(function() {
            cargar_listado();
        });
 </script>