<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
$filtros = "";
if (isset($_POST['b_rol']) == true &&  $_POST['b_rol']  != "") {
  $rol = $_POST['b_rol'];
  $rol = str_replace(" ", "%", $rol);
  $filtros .= " AND CONCAT_WS(' ', p.nombre) LIKE '%$rol%' ";
}
      
if (isset($_POST['b_modulo']) == true &&  $_POST['b_modulo']  != "") {
  $modulo = $_POST['b_modulo'];
  $modulo = str_replace(" ", "%", $modulo);
  $filtros .= " AND r.modulo LIKE '%$modulo%' ";
}
      
if (isset($_POST['b_accion']) == true &&  $_POST['b_accion']  != "") {
  $accion = $_POST['b_accion'];
  $accion = str_replace(" ", "%", $accion);
  $filtros .= " AND r.accion LIKE '%$accion%' ";
}

$sql_base = "SELECT 
  r.id_permiso_rol,
  r.id_rol,
  CONCAT_WS(' ', p.nombre) AS rol,     
  r.modulo,
  r.accion
  FROM permiso_rol r 
  JOIN rol p ON r.id_rol = p.id_rol
  WHERE TRUE $filtros
  ORDER BY rol
";
?>
<style>
  table {
    border-collapse: collapse;
  }

  th {
    text-align: left;
  }

  table,
  td,
  th {
    border: 0.5pt solid #aaa;
    padding: 3pt;
  }
</style>

<table>
  <thead>
    <tr style="font-weight: bold; background-color: #ddd;">
      <th style="width: 30pt;">Num.</th>
      <th style="width: 120pt;">Rol</th>
      <th style="width: 120pt;">Nombre modulo</th>
      <th style="width: 120pt;">Nombre acción</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = mysqli_query($conexion, $sql_base);
    $num = 1;
    while ($row = mysqli_fetch_array($result)) {
      if ($num % 2 == 0) {
        $color = "#eeeeee";
      } else {
        $color = "#ffffff";
      }
    ?>
      <tr style="background-color: <?php echo $color ?>;">
        <td style="width: 30pt;"><?php echo $num++ ?></td>
        <td style="width: 120pt;"><?php echo $row['rol'] ?></td>
        <td style="width: 120pt;"><?php echo $row['modulo'] ?></td>
        <td style="width: 120pt;"><?php echo $row['accion'] ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<?php
require_once 'php/tcpdf-config.php';
?>