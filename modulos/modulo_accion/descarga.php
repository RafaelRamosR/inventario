<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
$filtros = "";

if (isset($_POST['b_modulo']) == true &&  $_POST['b_modulo']  != "") {
  $b_modulo = $_POST['b_modulo'];
  $b_modulo = str_replace(" ", "%", $b_modulo);
  $filtros .= " AND m.modulo LIKE '%$b_modulo%' ";
}
      
if (isset($_POST['b_accion']) == true &&  $_POST['b_accion']  != "") {
  $b_accion = $_POST['b_accion'];
  $b_accion = str_replace(" ", "%", $b_accion);
  $filtros .= " AND m.accion LIKE '%$b_accion%' ";
}

$sql_base = "SELECT 
  m.id_modulo_accion,
  m.modulo,
  m.accion
  FROM  modulo_accion m 
  WHERE TRUE $filtros
  ORDER BY modulo
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
      <th style="width: 150pt;">Modulo</th>
      <th style="width: 150pt;">Acciones</th>
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
        <td style="width: 150pt;"><?php echo $row['modulo'] ?></td>
        <td style="width: 150pt;"><?php echo $row['accion'] ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<?php
require_once 'php/tcpdf-config.php';
?>