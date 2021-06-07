<?php
    require ('FPDF.php');
    require ('mysql.php');

    $query = new MySQL();
    $data = $query->selectAllEmployee();


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(16, 10, utf8_decode("Nómina"), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, "Nombre", 1, 0, 'C', 0);
    $pdf->Cell(30, 10, "A. Paterno", 1, 0, 'C', 0);
    $pdf->Cell(30, 10, "A. Materno", 1, 0, 'C', 0);
    $pdf->Cell(12, 10, "Sexo", 1, 0, 'C', 0);
    $pdf->Cell(25, 10, utf8_decode("Conratación"), 1, 0, 'C', 0);
    $pdf->Cell(25, 10, "Cargo", 1, 0, 'C', 0);
    $pdf->Cell(25, 10, "Usuario", 1, 1, 'C', 0);
    foreach ($data as $row) {
        $pdf->Cell(16, 10, $row->numNomina, 1, 0, 'C', 0);
        $pdf->Cell(30, 10, $row->nombre, 1, 0, 'C', 0);
        $pdf->Cell(30, 10, $row->apeP, 1, 0, 'C', 0);
        $pdf->Cell(30, 10, $row->apeM, 1, 0, 'C', 0);
        $pdf->Cell(12, 10, $row->sexo, 1, 0, 'C', 0);
        $pdf->Cell(25, 10, $row->fechaContratacion, 1, 0, 'C', 0);
        $pdf->Cell(25, 10, $row->idCargo, 1, 0, 'C', 0);
        $pdf->Cell(25, 10, $row->idUser, 1, 1, 'C', 0);
    }

    $pdf->Output('I',"employeesReport.pdf", false);

?>