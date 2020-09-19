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

if (isset($_POST['tipo_producto']) &&  $_POST['tipo_producto'] != "") {
    $nombre = $_POST['tipo_producto'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  tp.nombre LIKE '%$nombre%'";
}

if (isset($_POST['modelo']) == true &&  $_POST['modelo']  != "") {
    $nombre = $_POST['modelo'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  p.modelo LIKE '%$nombre%'";
}

if (isset($_POST['stock']) == true &&  $_POST['stock']  != "") {
    $nombre = $_POST['stock'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  p.stock LIKE '%$nombre%'";
}

if (isset($_POST['fecha_adquisicion']) == true &&  $_POST['fecha_adquisicion']  != "") {
    $filtros .= " AND p.fecha_adquisicion = '$_POST[fecha_adquisicion]' ";
}

if (isset($_POST['proveedor']) == true &&  $_POST['proveedor']  != "") {
    $nombre = $_POST['proveedor'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  pr.nombre LIKE '%$nombre%'";
}

if (isset($_POST['referencia']) == true &&  $_POST['referencia']  != "") {
    $nombre = $_POST['referencia'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= "  AND  p.referencia LIKE '%$nombre%'";
}

$sql_base = "SELECT           
    p.id_producto,
    p.nombre AS nombre_producto,
    tp.nombre AS nombre_tipo,
    p.modelo,
    p.stock,
    p.fecha_adquisicion,
    pr.nombre AS proveedor,
    p.referencia
    FROM producto p
    INNER JOIN tipo_producto tp ON p.id_tipo_producto = tp.id_tipo_producto
    INNER JOIN proveedores pr ON p.id_provedore = pr.id_proveedor
    WHERE TRUE $filtros
    ORDER BY nombre_producto
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
      <th style="width: 70pt;">Producto</th>
      <th style="width: 100pt;">Tipo</th>
      <th style="width: 70pt;">Modelo</th>
      <th style="width: 30pt;">Stock</th>
      <th style="width: 70px;">Adquisicion</th>
      <th style="width: 70px;">Proveedor</th>
      <th style="width: 70px;">Referencia</th>
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
        <td style="width: 70pt;"><?php echo $row['nombre_producto'] ?></td>
        <td style="width: 100pt;"><?php echo $row['nombre_tipo'] ?></td>
        <td style="width: 70pt;"><?php echo $row['modelo'] ?></td>
        <td style="width: 30pt;"><?php echo $row['stock'] ?></td>
        <td style="width: 70pt;"><?php echo $row['fecha_adquisicion'] ?></td>
        <td style="width: 70pt;"><?php echo $row['proveedor'] ?></td>
        <td style="width: 70pt;"><?php echo $row['referencia'] ?></td>
      </tr>
    <?php
      }
    ?>
  </tbody>
</table>

<?php
  require_once 'php/tcpdf-config.php';
?>