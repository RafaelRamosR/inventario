<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
$filtros = "";

if (isset($_POST['nombre']) == true &&  $_POST['nombre']  != "") {
  $nombre = $_POST['nombre'];
  $nombre = str_replace(" ", "%", $nombre);
  $filtros .= " AND ti.nombre LIKE '%$nombre%'";
}

$sql_base = "SELECT documento, COUNT(*) total 
  FROM (
    SELECT ti.nombre as documento FROM persona p
    INNER JOIN tipo_identidad ti ON p.id_tipo_de_identificacion = ti.id_tipo_identidad
    WHERE TRUE $filtros
  ) tabla_temporal
  GROUP BY documento
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
      <th style="width: 170pt;">Tipo documento</th>
      <th style="width: 70pt;">Total</th>
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
        <td style="width: 170pt;"><?php echo $row['documento'] ?></td>
        <td style="width: 70pt;"><?php echo $row['total'] ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<?php
require_once 'php/tcpdf-config.php';
?>