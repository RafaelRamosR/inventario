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


if (isset($_GET['tipo_identificacion_id']) == true &&  $_GET['tipo_identificacion_id']  != "") {
    $filtros .= " AND u.tipo_identificacion_id = '$_GET[tipo_identificacion_id]' ";
}

if (isset($_GET['identificacion']) == true &&  $_GET['identificacion']  != "") {
    $filtros .= " AND u.identificacion = '$_GET[identificacion]' ";
}

if (isset($_GET['name_user']) == true &&  $_GET['name_user']  != "") {
    $nombre = $_GET['name_user'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= " AND CONCAT_WS(' ',u.name_user,u.last_name_user) LIKE '%$nombre%' ";
}


$sql = "SELECT 
            u.id_user,
     
            CONCAT_WS(' ', u.name_user, u.last_name_user) AS nombre,
            
                u.direccion,
                u.mail_user,
         
                u.phone_user,
                u.pw_user
        
           
        FROM
            user u
              
           
           

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
         <tr>   
        <tr>
   
        <tr>
            <th>No</th>
            <th>Nombre </th>
            <th>Direccion</th>
            <th>Correo</th>
             <th>Telefono</th>
            <th>Clave</th>
            <th>Acciones</th>
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
       
            echo "<td>$row[nombre]</td>";
            echo "<td>$row[direccion]</td>";
             echo "<td>$row[mail_user]</td>";
            echo "<td>$row[phone_user]</td>";
               echo "<td>$row[pw_user]</td>";
            echo "<td class='acciones'>
                    <a href='javascript:;' class='mostrar'  onclick='mostrar(\"$row[id_user]\")'>
                        <i class='fas fa-eye'></i>
                    </a>
                    <a href='javascript:;' class='eliminar' onclick='eliminar(\"$row[id_user]\")'>
                         <i class='fas fa-trash'></i>
                    </a>
                    <a href='javascript:;' class='modificar' onclick='modificar(\"$row[id_user]\")'>
                        <i class='fas fa-edit'></i>
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

<?php
/*
for($i=1;$i<=$num_paginas;$i++) {

    echo "<button class='btn btn-sm btn-secondary m-1'>$i</button>";
}*/
?>

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

        <button type="button" class="btn btn-sm btn-secondary" id="btn-inicio">
            << </button> <button type="button" class="btn btn-sm btn-secondary" id="btn-anterior">
                < </button> <input type="text" value="<?php echo $pagina ?>" id="pagina_actual" name="pagina_actual" style="width:40px" />
                /
                <input type="text" value="<?php echo $num_paginas ?>" id="num_paginas" style="width:40px" disabled />

                <button type="button" class="btn btn-sm btn-secondary" id="btn-siguiente"> > </button>
                <button type="button" class="btn btn-sm btn-secondary" id="btn-final"> >> </button>


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