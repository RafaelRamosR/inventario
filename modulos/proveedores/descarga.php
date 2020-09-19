<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
$filtros = "";

if (isset($_POST['nombre']) == true &&  $_POST['nombre']  != "") {
    $nombre = $_POST['nombre'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= " AND p.nombre LIKE '%$nombre%' ";
}

if (isset($_POST['telefono']) == true &&  $_POST['telefono']  != "") {
    $nombre = $_POST['telefono'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= " AND p.telefono LIKE '%$nombre%' ";
}

if (isset($_POST['direccion']) == true &&  $_POST['direccion']  != "") {
    $nombre = $_POST['direccion'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= " AND p.dir LIKE '%$nombre%' ";
}

if (isset($_POST['correo']) == true &&  $_POST['correo']  != "") {
    $nombre = $_POST['correo'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= " AND p.correo LIKE '%$nombre%' ";
}

$sql_base = "SELECT              
    p.id_proveedor,
    p.nombre,
    p.telefono,
    p.dir,
    p.correo
    FROM
    proveedor p
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
      <th style="width: 150pt;">Proveedor</th>
      <th style="width: 100pt;">Telefono</th>
      <th style="width: 100pt;">Dirreción</th>
      <th style="width: 120pt;">Correo</th>
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
        <td style="width: 150pt;"><?php echo $row['nombre'] ?></td>
        <td style="width: 100pt;"><?php echo $row['telefono'] ?></td>
        <td style="width: 100pt;"><?php echo $row['dir'] ?></td>
        <td style="width: 120pt;"><?php echo $row['correo'] ?></td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>

<?php
  require_once 'php/tcpdf-config.php';
?>