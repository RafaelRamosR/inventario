<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
$filtros = "";

if (isset($_POST['municipio']) == true &&  $_POST['municipio']  != "") {
    $municipio = $_POST['municipio'];
    $municipio = str_replace(" ", "%", $municipio);
    $filtros .= " AND e.nombre LIKE '%$municipio%' ";
}

if (isset($_POST['departamento']) == true &&  $_POST['departamento']  != "") {
    $departamento = $_POST['departamento'];
    $departamento = str_replace(" ", "%", $departamento);
    $filtros .= " AND d.nombre LIKE '%$departamento%' ";
}

$sql_base = "SELECT             
    e.id,
    e.nombre,
    d.nombre AS departamento
    FROM municipio e
    JOIN departamento d ON e.departamento = d.id
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
            <th style="width: 150pt;">Municipio</th>
            <th style="width: 150pt;">Departamento</th>
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
                <td style="width: 150pt;"><?php echo $row['departamento'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
require_once 'php/tcpdf-config.php';
?>