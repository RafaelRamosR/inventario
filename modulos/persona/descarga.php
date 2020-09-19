<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
$filtros = "";

if (isset($_POST['identifica']) &&  $_POST['identifica'] != "") {
    $idetifica = $_POST['identifica'];
    $idetifica = str_replace(" ", "%", $idetifica);
    $filtros .= " AND Num_Identificacion LIKE '%$idetifica%'";
}

if (isset($_POST['nombre']) &&  $_POST['nombre'] != "") {
    $nombre = $_POST['nombre'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= " AND CONCAT_WS(' ',p.primer_nombre,p.primer_apellido) LIKE '%$nombre%'";
}

if (isset($_POST['fecha']) == true &&  $_POST['fecha']  != "") {
    $filtros .= " AND p.fecha_nacimiento = '$_POST[fecha]' ";
}

if (isset($_POST['municipio']) &&  $_POST['municipio'] != "") {
    $municipio = $_POST['municipio'];
    $municipio = str_replace(" ", "%", $municipio);
    $filtros .= " AND m.nombre LIKE '%$municipio%'";
}

if (isset($_POST['telefono']) &&  $_POST['telefono'] != "") {
    $telefono = $_POST['telefono'];
    $telefono = str_replace(" ", "%", $telefono);
    $filtros .= " AND telefono_principal LIKE '%$telefono%'";
}

if (isset($_POST['telefono_alt']) &&  $_POST['telefono_alt'] != "") {
    $telefono = $_POST['telefono_alt'];
    $telefono = str_replace(" ", "%", $telefono);
    $filtros .= " AND telefono_alternativo LIKE '%$telefono%'";
}

$sql_base = "SELECT              
    p.id_persona,
    p.Num_Identificacion,
    CONCAT_WS(' ', p.primer_nombre, p.primer_apellido) AS nombre,
    p.fecha_nacimiento,
    m.nombre AS municipio,
    p.telefono_principal,
    p.telefono_alternativo,
    d.nombre AS departamento
    FROM persona p
    INNER JOIN municipio m ON p.id_municipio_de_nacimiento = m.id
    INNER JOIN departamento d ON m.departamento = d.id
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
      <th style="width: 70pt;">Identific.</th>
      <th style="width: 100pt;">Nombre completo</th>
      <th style="width: 70pt;">Fecha naci.</th>
      <th style="width: 120pt;">Municipio</th>
      <th style="width: 70px;">Telefono</th>
      <th style="width: 70px;">Telefono alternativo</th>
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
        <td style="width: 70pt;"><?php echo $row['Num_Identificacion'] ?></td>
        <td style="width: 100pt;"><?php echo $row['nombre'] ?></td>
        <td style="width: 70pt;"><?php echo $row['fecha_nacimiento'] ?></td>
        <td style="width: 120pt;"><?php echo $row['municipio'] ?></td>
        <td style="width: 70pt;"><?php echo $row['telefono_principal'] ?></td>
        <td style="width: 70pt;"><?php echo $row['telefono_alternativo'] ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<?php
  require_once 'php/tcpdf-config.php';
?>