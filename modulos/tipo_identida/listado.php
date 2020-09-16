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

$sql_cantidad = "SELECT COUNT(*) AS cantidad FROM persona";
$rs_cantidad = mysqli_query($conexion,$sql_cantidad);
$row_cantidad = mysqli_fetch_assoc($rs_cantidad);
$cantidad = $row_cantidad['cantidad'];
$num_paginas = ceil ($cantidad/$num_registros);
$inicio = ($pagina-1)*$num_registros;
?>
<table class="table table-striped" align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>Nombre de tipo identidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $num = $inicio+1;
        $filtros = "";

        if (isset($_GET['id']) == true &&  $_GET['id']  != "") {
            $filtros .= " AND e.id = '$_GET[id]' ";
        }



        $sql = "SELECT             
                        t.id_tipo_identidad,
                   
                   t.nombre

                FROM
                tipo_identidad t
                       
                WHERE TRUE $filtros
                ORDER BY nombre
                LIMIT $inicio, $num_registros
                        ";
        $rs = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($rs)) {
            echo "<tr>";
            echo "<td>$num</td>";
          
            echo "<td>$row[nombre]</td>";
            echo "<td class='acciones'>
                 
                    <a href='javascript:;' class='eliminar' onclick='eliminar(\"$row[id_tipo_identidad]\")'>
                        <i class='fa fa-trash'></i>
                    </a>
                    <a href='javascript:;' class='modificar' onclick='modificar(\"$row[id_tipo_identidad]\")'>
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