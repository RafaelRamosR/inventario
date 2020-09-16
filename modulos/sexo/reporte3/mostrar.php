<?php
ob_start();
set_time_limit(0); //No limitar el tiempo de ejecución de PHP
ini_set('memory_limit', '-1'); //No liminar la memoría de PHP
?>

<style>
    td,
    th {
        border: 0.2pt solid #ccc;
    }

    h3 {
        margin: 0px;
    }
</style>

<?php

$id_municipio = $_POST['municipio_id'];
$sql = "SELECT 
            CONCAT_WS(' ',
                    c1.nombre1,
                    c1.nombre2,
                    c1.apellido1,
                    c1.apellido2) AS nombre,
            m1.nombre AS municipio_nacimiento,
            m2.nombre AS municipio_residencia,
            c2.nombre AS cargo,
            c1.sueldo
            FROM
            consultora.consultor c1
                JOIN
            consultora.cargo c2 ON c1.id_cargo = c2.id_cargo
                JOIN
            consultora.municipio m1 ON c1.id_municipio_nacimiento = m1.id_municipio
                JOIN
            consultora.municipio m2 ON c1.id_municipio_residencia = m2.id_municipio
            WHERE c1.id_municipio_nacimiento ='$id_municipio'
            ORDER BY nombre
 
";
 
$rs = mysqli_query($conexion, $sql);
$num = 1;
?>


<table style="font-family:'Times New Roman', Times, serif; font-size:8pt; 
       border-collapse:collapse" cellpadding="2" cellspacing="0">
    <thead>
        <tr style="font-weight:bold; text-align:left; background-color:#e1e1e1">
            <th style="width:10mm">No</th>
            <th style="width:40mm">Nombre</th>
            <th style="width:40mm">Municipio N.</th>
            <th style="width:40mm">Municipio R.</th>
            <th style="width:40mm">Cargo</th>
            <th style="width:20mm">Sueldo</th>
        </tr>
    </thead>

    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($rs)) {
            if ($num % 2 == 0) {
                $fondo = "#eee";
            } else {
                $fondo = "#fff";
            }
            echo "<tr style=\"text-align:left; background-color:$fondo\" > ";
            echo "<td style=\"width:10mm;\">$num</td>";
            echo "<td style=\"width:40mm;\">$row[nombre]</td>";
            echo "<td style=\"width:40mm;\">$row[municipio_nacimiento]</td>";
            echo "<td style=\"width:40mm;\">$row[municipio_residencia]</td>";
            echo "<td style=\"width:40mm;\">$row[cargo]</td>";
            echo "<td style=\"width:20mm; text-align:right\">$row[sueldo]</td>";
            echo "</tr>";
            $num++;
        }
        ?>
    </tbody>
</table>


<?php
        $html = ob_get_clean();
        $formato = $_POST['formato'];

        if ($formato == "html") {
            echo $html;
        } else if ($formato == "doc") {
            header("Content-Type: application/download");
            header("Content-Disposition: attachment; filename=reporte1.doc;");
            echo $html;
 
        } else if ($formato == "xls") {
            header("Content-Type: application/download");
            header("Content-Disposition: attachment; filename=reporte1.xls;");
            echo $html;
        } else if($formato=="pdf") {
            require_once("php/tcpdf/tcpdf.php");
            require_once("php/reporte.php");
            //Iniciar la clase PDF

            //Orientación del papel (P=Verticial, L=Horizontal)
            //


            $titulo="<div style=\"text-align:center\"> 
            <b>REPORTE DE PRUEBA 3</b>
            <br/> 
            MENA</div>";

            $pdf = new REPORTE("P", "mm", "LETTER", true, 'UTF-8', false);

            //Definir los margenes
            //Margin Izquierdo, Superior, Derecho
            $pdf->SetMargins(10, 30, 10);
            //Margen del encabezado
            $pdf->SetHeaderMargin(0);
            //Margen del pie de pagina
            $pdf->SetFooterMargin(40);

            //Margen para el salto de linea. Debe ser mayor que el margen del pie de pagina 
            $pdf->SetAutoPageBreak(TRUE, 50);

            //Tipo y tamaño de letra
            $pdf->SetFont('times', '', 10);

            //Agregar una pagina
            $pdf->AddPage();

            //Poner el contenido HTML generado dentro del archivo PDF
            $pdf->writeHTML($html, true, false, true, false, '');

            //Generar el archivo PDF y mostrarlo en el navegador
            $pdf->Output('reporte1.pdf', 'I');

        }

?>