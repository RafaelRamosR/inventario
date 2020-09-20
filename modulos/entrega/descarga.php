<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
$filtros = "";

if (isset($_POST['producto']) == true &&  $_POST['producto']  != "") {
    $producto = $_POST['producto'];
    $producto = str_replace(" ", "%", $producto);
    $filtros .= " AND p.nombre LIKE '%$producto%' ";
}

$sql_base = "SELECT 
  COUNT(*) AS total_filas,
  MIN(fecha_adquisicion) AS fecha_min,
  MAX(fecha_entrega) AS fecha_max, 
  SUM(cantidad) AS total,
  AVG(Is_entregado) AS promedio
  FROM entrega
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
      <th style="width: 120pt;">Fecha mínima adquisición</th>
      <th style="width: 120pt;">Fecha máxima entrega</th>
      <th style="width: 90pt;">Total de Entregas</th>
      <th style="width: 90px;">Promedio Entrega</th>
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
        <td style="width: 120pt;"><?php echo $row['fecha_max'] ?></td>
        <td style="width: 90pt;"><?php echo $row['total'] ?></td>
        <td style="width: 90pt;"><?php echo $row['promedio'] ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<?php
require_once 'php/tcpdf-config.php';
?>