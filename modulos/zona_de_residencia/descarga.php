<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
$filtros = "";

if (isset($_POST['nombre']) == true && $_POST['nombre']  != "") {
    $nombre = $_POST['nombre'];
    $nombre = str_replace(" ", "%", $nombre);
    $filtros .= " AND nombre LIKE '%$nombre%' ";
}

$sql_base = "SELECT 
    id_zona_de_residencia,
    nombre
    FROM zona_de_residencia 
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
            <th style="width: 170pt;">Nombre zona residencia</th>
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
                <td style="width: 170pt;"><?php echo $row['nombre'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
require_once 'php/tcpdf-config.php';
?>