<?php
$html = ob_get_clean();
$formato = $_POST['formato'];
if ($formato == "word") {
  //Tratar la repuesta del navegador como un archido descargable
  header("Content-Disposition: attachment; filename=reporte.doc");
  //Decirle al nevegador que el archivo expira en 0 segundo, para que no lo guarde en Cache
  header("Expires: 0");
  //Forzar a pedir de nuevo el archivo, si se hace una nueva solicitud
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  echo $html;
} else if ($formato == "excel") {
  //Tratar la repuesta del navegador como un archido descargable
  header("Content-Disposition: attachment; filename=reporte.xls");
  //Decirle al nevegador que el archivo expira en 0 segundo, para que no lo guarde en Cache
  header("Expires: 0");
  //Forzar a pedir de nuevo el archivo, si se hace una nueva solicitud
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  echo $html;
} else if ($formato == "html") {
  echo $html;
} else if ($formato == "pdf") {
  // Include the main TCPDF library (search for installation path).
  require_once('php/tcpdf/tcpdf.php');
  // create new PDF document
  $pdf = new TCPDF("p", "pt", "letter", true, 'UTF-8', false);
  // set margins
  //Establecer margenes: Izquierdo, Superior, Derecho
  $pdf->SetMargins(40, 80, 40);
  //Establecer margen del encabezado
  $pdf->SetHeaderMargin(30);
  //Establecer margen del pie de pagina
  $pdf->SetFooterMargin(35);
  // set auto page breaks
  // Margen del salto de pagina
  // Debe ser superior o igual al margen del pie de pagina
  $pdf->SetAutoPageBreak(TRUE, 60);
  // set font
  $pdf->SetFont('times', '', 10);
  // add a page
  $pdf->AddPage();
  $pdf->writeHTML($html);
  //Close and output PDF document
  ob_end_clean();
  $pdf->Output('reporte.pdf', 'I');
}
?>