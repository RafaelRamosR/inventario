<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
$filtros = "";

if (isset($_POST['nombre_producto']) &&  $_POST['nombre_producto'] != "") {
    $nombre = $_POST['nombre_producto'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  p.nombre LIKE '%$nombre%'";
}

$sql_base = "SELECT 
  COUNT(*) AS total_filas,
  MIN(fecha_adquisicion) AS fecha_min,
  MAX(stock) AS stock_max, 
  SUM(stock) AS total,
  AVG(id_tipo_producto) AS promedio
  FROM producto p
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
      <th style="width: 50pt;">Total filas</th>
      <th style="width: 120pt;">Fecha minima Aquisicion</th>
      <th style="width: 80pt;">Máximo stock</th>
      <th style="width: 120px;">Total Stock Productos</th>
      <th style="width: 120px;">Promedio productos</th>
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
        <td style="width: 50pt;"><?php echo $row['total_filas'] ?></td>
        <td style="width: 120pt;"><?php echo $row['fecha_min'] ?></td>
        <td style="width: 80pt;"><?php echo $row['stock_max'] ?></td>
        <td style="width: 120pt;"><?php echo $row['total'] ?></td>
        <td style="width: 120pt;"><?php echo $row['promedio'] ?></td>
      </tr>
    <?php
      }
    ?>
  </tbody>
</table>

<?php
  require_once 'php/tcpdf-config.php';
?>