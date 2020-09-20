<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
$filtros = "";

if (isset($_POST['b_usuario']) &&  $_POST['b_usuario'] != "") {
  $usuario = $_POST['b_usuario'];
  $usuario = str_replace(" ", "%", $usuario);
  $filtros .= " AND CONCAT_WS(' ', o.primer_nombre, o.primer_apellido)  LIKE '%$usuario%'";
}

if (isset($_POST['b_rol']) &&  $_POST['b_rol'] != "") {
  $rol = $_POST['b_rol'];
  $rol = str_replace(" ", "%", $rol);
  $filtros .= " AND p.nombre LIKE '%$rol%'";
}

$sql_base = "SELECT 
  u.id_persona_rol,
  u.id_persona,
  u.id_rol,
  p.nombre AS rol,
  CONCAT_WS(' ', o.primer_nombre, o.primer_apellido) AS usuario      
  FROM persona_rol u 
  JOIN rol p ON u.id_rol = p.id_rol
  inner join persona o ON u.id_persona = o.id_persona
  WHERE TRUE $filtros
  ORDER BY usuario
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
      <th style="width: 150pt;">Usuario</th>
      <th style="width: 150pt;">Nombre rol</th>
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
        <td style="width: 150pt;"><?php echo $row['usuario'] ?></td>
        <td style="width: 150pt;"><?php echo $row['rol'] ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<?php
require_once 'php/tcpdf-config.php';
?>