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

if (isset($_GET['identifica']) &&  $_GET['identifica'] != "") {
    $idetifica = $_GET['identifica'];
    //Buscar espacio y reemplazarlos por %
    $idetifica = str_replace(" ", "%", $idetifica);
    $filtros .= "  AND  Num_identificacion LIKE '%$idetifica%'";
}

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

$sql = "SELECT              
            p.id_persona,
            p.Num_Identificacion,
            CONCAT_WS(' ', p.primer_nombre, p.primer_apellido) AS nombre,
            p.fecha_nacimiento,
            m.nombre AS municipio,
            p.telefono_principal,
            p.telefono_alternativo,
            d.nombre AS departamento

        FROM
            persona p
                INNER JOIN
            municipio m ON p.id_municipio_de_nacimiento = m.id
                INNER JOIN
            departamento d ON m.departamento = d.id
        WHERE TRUE $filtros
                ";
//Paginación

$sql_cantidad = "SELECT COUNT(*) AS cantidad FROM ( $sql ) AS t";
$rs_cantidad = mysqli_query($conexion, $sql_cantidad);
 echo mysqli_error($conexion);
$row_cantidad = mysqli_fetch_assoc($rs_cantidad);
$cantidad = $row_cantidad['cantidad'];
$num_paginas = ceil($cantidad / $num_registros);
$inicio = ($pagina - 1) * $num_registros;

$sql .= " ORDER BY nombre LIMIT $inicio, $num_registros  ";

?>

<table class="table table-striped" align="center">
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
                    <input type="text" name="municipio" class="form-control form-control-sm" value="<?php echo isset($_GET['municipio']) ? $_GET['municipio'] : ""  ?>" />
                </th>
                <th scope="col">
                    <input type="text" name="telefono" class="form-control form-control-sm" value="<?php echo isset($_GET['telefono']) ? $_GET['telefono'] : ""  ?>" />

                </th>
                <th scope="col">
                    <input type="text" name="telefono" class="form-control form-control-sm" value="<?php echo isset($_GET['telefono']) ? $_GET['telefono'] : ""  ?>" />

                </th>
                <th scope="col">
                    <input type="text" name="telefono" class="form-control form-control-sm" value="<?php echo isset($_GET['telefono']) ? $_GET['telefono'] : ""  ?>" />

                </th>
                <th scope="col" style="text-align: center;">
                    <button class="btn btn-sm btn-primary" onclick="mover_pagina('1')">
                        <i class="fas fa-search"></i>
                    </button>
                </th>
    </thead>
    <tbody>

<?php
$num = $inicio+1;
        
$rs = mysqli_query($conexion, $sql);
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