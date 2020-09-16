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

$sql_cantidad = "SELECT COUNT(*) AS cantidad FROM producto";
$rs_cantidad = mysqli_query($conexion,$sql_cantidad);
echo mysqli_error($conexion);
$row_cantidad = mysqli_fetch_assoc($rs_cantidad);
$cantidad = $row_cantidad['cantidad'];
$num_paginas = ceil ($cantidad/$num_registros);
$inicio = ($pagina-1)*$num_registros;
?>
<table class="table table-striped table-sm">
    <thead>
        <tr>
        <th>No</th>
            <th>Nombre producto.</th>
            <th>Tipo</th>
            <th>Modelo.</th>
            <th>Stock Naci</th>
            <th>Fecha adquisicion</th>
            <th>Proveedor</th>
            <th>Referencia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>


        <?php 

        $num = $inicio+1;
        $filtros = "";

        if (isset($_GET['id_tipo_identificacion2']) == true &&  $_GET['id_tipo_identificacion2']  != "") {
            $filtros .= " AND p.id_tipo_de_identificacion = '$_GET[id_tipo_identificacion2]' ";
        }

        if (isset($_GET['Nuidentificacion2']) == true &&  $_GET['Nuidentificacion2']  != "") {
            $filtros .= " AND p.Num_Identificacion = '$_GET[Nuidentificacion2]' ";
        }

        if (isset($_GET['PriNombre2']) == true &&  $_GET['PriNombre2']  != "") {
            $nombre = $_GET['PriNombre2'];
            $nombre = str_replace(" ", "%", $nombre);
            $filtros .= " AND CONCAT_WS(' ',p.primer_nombre,p.primer_apellido) LIKE '%$nombre%' ";
        }

        if (isset($_GET['Fechanacimiento2']) == true &&  $_GET['Fechanacimiento2']  != "") {
            $filtros .= " AND p.fecha_nacimiento = '$_GET[Fechanacimiento2]' ";

        }

        if (isset($_GET['Muninacimiento2']) == true &&  $_GET['Muninacimiento2']  != "") {
            $filtros .= " AND p.id_municipio_de_nacimiento = '$_GET[Muninacimiento2]' ";

        }
        
         if (isset($_GET['Departamento2']) == true &&  $_GET['Departamento2']  != "") {
            $filtros .= " AND m.departamento = '$_GET[Departamento2]' ";

        }


         if (isset($_GET['Telprincipal2']) == true &&  $_GET['Telprincipal2']  != "") {
            $telefono = $_GET['Telprincipal2'];
            $telefono= str_replace(" ", "%", $telefono);
            $filtros .= " AND CONCAT_WS(' ',p.telefono_principal,p.telefono_alternativo) LIKE '%$telefono%' ";

        }

        // if (isset($_GET['muni']) == true && $_GET['muni'] != "") {
        //     $muni = $_GET['muni'];
        //     $muni = str_replace(" ", "%", $muni);
        //      $filtros .= " AND CONCAT_WS(' ',municipio.nombre,departamento.nombre) LIKE '%$muni%'  "; 
        // }
        
        $sql = "SELECT 
                    p.id_producto,
                    p.nombre AS nombre_producto,
                    tp.nombre AS nombre_tipo,
                    p.modelo,
                    p.stock,
                    p.fecha_adquisicion,
                    p.id_provedore,
                    p.referencia
                
                FROM producto p
                JOIN tipo_producto tp ON p.id_tipo_producto = tp.id_tipo_producto
                WHERE TRUE $filtros
            ORDER BY nombre
                LIMIT $inicio, $num_registros
                ";
        $rmu = mysqli_query($conexion, $sql);
        echo mysqli_error($conexion);
        while ($row = mysqli_fetch_assoc($rmu)) {
            echo "<tr>";
            echo "<td>$row[nombre_producto]</td>";
            echo "<td>$row[nombre_tipo]</td>";
            echo "<td>$row[modelo]</td>";
            echo "<td>$row[stock]</td>";
            echo "<td>$row[fecha_adquisicion]</td>";
            echo "<td>$row[id_provedore]</td>";
            echo "<td>$row[referencia]</td>";
              echo "<td class='acciones'>
                               
                    <a href='javascript:;' class='eliminar' onclick='eliminar(\"$row[id_producto]\")'>
                        <i class='fas fa-trash'></i>
                    </a>
                    <a href='javascript:;' class='modificar' onclick='modificar(\"$row[id_producto]\")'>
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
            <option value="5">5</option>
            <option value="15">15</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        
        <button type="button" class="btn btn-sm btn-secondary" id="btn-inicio"> << </button>
        <button type="button" class="btn btn-sm btn-secondary" id="btn-anterior"> <  </button>
        
        <input  type="text" value="<?php echo $pagina ?>" id="pagina_actual" name="pagina_actual" style="width:40px"/>
        /
        <input  type="text" value="<?php echo $num_paginas ?>" id="num_paginas"  style="width:40px" disabled />

        <button type="button" class="btn btn-sm btn-secondary" id="btn-siguiente"> > </button>
        <button type="button" class="btn btn-sm btn-secondary" id="btn-final"> >>  </button>
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