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

if (isset($_POST['adquisicion']) == true && $_POST['adquisicion']  != "") {
    $filtros .= " AND e.fecha_adquisicion = '$_POST[adquisicion]' ";
}

if (isset($_POST['entrega']) == true && $_POST['entrega']  != "") {
    $filtros .= " AND e.fecha_entrega = '$_POST[entrega]' ";
}

if (isset($_POST['referencia']) == true && $_POST['referencia']  != "") {
    $referencia = $_POST['referencia'];
    $referencia = str_replace(" ", "%", $referencia);
    $filtros .= " AND e.referencia LIKE '%$referencia%' ";
}

if (isset($_POST['cantidad']) == true && $_POST['cantidad']  != "") {
    $cantidad = $_POST['cantidad'];
    $cantidad = str_replace(" ", "%", $cantidad);
    $filtros .= " AND e.cantidad LIKE '%$cantidad%' ";
}

if (isset($_POST['responsable']) == true && $_POST['responsable']  != "") {
    $responsable = $_POST['responsable'];
    $responsable = str_replace(" ", "%", $responsable);
    $filtros .= " AND e.responsable LIKE '%$responsable%' ";
}

$sql_base = "SELECT             
    e.id_entrega,
    e.id_producto,
    p.nombre,
    e.fecha_adquisicion,
    e.fecha_entrega,
    e.referencia,
    e.responsable,
    e.cantidad
    FROM entrega e
    JOIN producto p ON e.id_producto = p.id_producto
    WHERE TRUE $filtros
    ORDER BY nombre
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
      <th style="width: 100pt;">Producto</th>
      <th style="width: 100pt;">Fecha adquisición</th>
      <th style="width: 70pt;">Fecha entrega</th>
      <th style="width: 70pt;">Referencia</th>
      <th style="width: 70px;">Responsable</th>
      <th style="width: 70px;">Cantidad</th>
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
        <td style="width: 100pt;"><?php echo $row['nombre'] ?></td>
        <td style="width: 100pt;"><?php echo $row['fecha_adquisicion'] ?></td>
        <td style="width: 70pt;"><?php echo $row['fecha_entrega'] ?></td>
        <td style="width: 70pt;"><?php echo $row['referencia'] ?></td>
        <td style="width: 70pt;"><?php echo $row['responsable'] ?></td>
        <td style="width: 70pt;"><?php echo $row['cantidad'] ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<?php
require_once 'php/tcpdf-config.php';
?>