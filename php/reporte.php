<?php
class REPORTE extends TCPDF {

    //Page header
    public function Header() {
        // Logo
         global $titulo2;
        global $titulo;

    



        
       $this->Image("img/escudo.jpg", 10, 5, 25);
        
        // Set font
        //$this->SetFont('helvetica', 'B', 20);
        // Title
          $this->SetY(5);
        $this->SetFont('helvetica', 'I', 8); 
       $this->writeHTML($titulo2, true, false, true, false,   '');

        $this->SetY(4); 


         $this->writeHTML($titulo, true, false, true, false, '');

        }


    // Page footer
    public function Footer() {
         global $fotter;
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
            
       $this->SetFont('helvetica', 'I', 8);
         $this->writeHTML($fotter, true, false, true, false, '');
        $this->SetFont('helvetica', 'I', 8);
        // Page number

         $this->Cell(0, 2, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

         

    }
}

?>