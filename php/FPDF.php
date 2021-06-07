<?php
    require ('../fpdf183/fpdf.php');

    class PDF extends FPDF {

        function Header() {

            $this->Image('http://localhost/bd2/img/Logo.png',10,6,50);

            $this->SetFont('Arial','I',30);
            // Move to the right
            $this->Cell(80);
            // Title
            $this->Cell(50,10,'Minisuper Solariatown',0,0,'C');
            // Line break
            $this->Ln(35);
        }

        // Page footer
        function Footer() {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    } 

?>