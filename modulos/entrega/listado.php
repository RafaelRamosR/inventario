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
        
if (isset($_GET['producto']) == true &&  $_GET['producto']  != "") {
    $producto = $_GET['producto'];
    $producto = str_replace(" ", "%", $producto);
    $filtros .= " AND p.nombre LIKE '%$producto%' ";
}

if (isset($_GET['tipo_producto']) == true &&                   $_GET['tipo_producto']  != "") {
    $filtros .= " AND e.fecha_adquisicion = '$_GET[tipo_producto]' ";
}

if (isset($_GET['fecha_entrega2']) == true &&                   $_GET['fecha_entrega2']  != "") {
    $filtros .= " AND e.fecha_entrega = '$_GET[fecha_entrega2]' ";
}

if (isset($_GET['referencia2']) == true &&                     $_GET['referencia2']  != "") {
    $filtros .= " AND e.referencia = '$_GET[referencia2]' ";
}

if (isset($_GET['responsable2']) == true &&                     $_GET['responsable2']  != "") {
    $responsable = $_GET['responsable2'];
    $responsable = str_replace(" ", "%", $responsable);
    $filtros .= " AND e.responsable LIKE '%$responsable%' ";
}

$sql = "SELECT             
            e.id_entrega,
            e.id_producto,
            p.nombre,
            e.fecha_adquisicion,
            e.fecha_entrega,
            e.referencia,
            e.responsable,
            e.cantidad

        FROM
             entrega e
        JOIN producto p ON e.id_producto = p.id_producto
        WHERE TRUE $filtros
                        ";


//Paginación

$sql_cantidad = "SELECT COUNT(*) AS cantidad FROM ( $sql ) AS t";
$rs_cantidad = mysqli_query($conexion,$sql_cantidad);
$row_cantidad = mysqli_fetch_assoc($rs_cantidad);
$cantidad = $row_cantidad['cantidad'];
$num_paginas = ceil ($cantidad/$num_registros);
$inicio = ($pagina-1)*$num_registros;

$sql .= " ORDER BY id_producto LIMIT $inicio, $num_registros  ";
?>
<table class="table table-striped" align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>Producto</th>
            <th>Adquisición</th>
            <th>Entrega</th>
            <th>Referencia</th>
            <th>Responsable</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
<?php
$num = $inicio+1;

$rs = mysqli_query($conexion, $sql);
echo mysqli_error($conexion);
while ($row = mysqli_fetch_assoc($rs)) {
    echo "<tr>";
    echo "<td>$num</td>";
    echo "<td>$row[nombre]</td>";
    echo "<td>$row[fecha_adquisicion]</td>";
    echo "<td>$row[fecha_entrega]</td>";
    echo "<td>$row[referencia]</td>";
    echo "<td>$row[responsable]</td>";
    echo "<td>$row[cantidad]</td>";
    echo "<td class='acciones'>
            
            <a href='javascript:;' class='eliminar' onclick='eliminar(\"$row[id_entrega]\")'>
                <i class='fa fa-trash'></i>
            </a>
            <a href='javascript:;' class='modificar' onclick='modificar(\"$row[id_entrega]\")'>
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